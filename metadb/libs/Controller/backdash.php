<?php
/*
 * File:   backdash.php
 * Copyright 2013, Twitter, Inc.. All Rights Reserved.
 *
 * @author Jennifer LaGrutta <jen@twitter.com>
 *
 * This file contains functions that are invoked from the MySQL backup
 * dashboard's index.php page, functions that return snippets of HTML
 * that are used to build larger HTML snippets, and functions that
 * fetch rows from the database.
 *
 * The following functions actually output HTML to STDOUT and are meant
 * to be called from PHP, they all begin with 'output':
 *
 *   outputLastUpdated ()
 *   outputClusterLinkItems ()
 *   outputSummaryTab ()
 *   outputSections ()
 *   outputTableSorterInitLines ()
 *
 */

/*
 * This file defines the db credentials as constants and is outside
 * the doc root for security reasons.
 *
 */
require ('/home/mikeh/php/config.php');

/*
 * Function: outputLastUpdated
 *
 * This function outputs when the backup information was last updated.
 * How it gets this is at present kind of janky, but works.
 *
 */
function outputLastUpdated () {
  $results = getLastUpdated ();
  $row = $results[0];

  printf ("%s UTC.", $row['created']);
}

/*
 * Function: outputClusterLinkItems
 *
 * This function generates a list of cluster names for the data center
 * that has backups for the the largest number of clusters.  The
 * getDCs function returns data centers sorted by the number of
 * different cluster backups that the data center has.  We generate
 * <li> tags and anchors for each cluster. This is used by the
 * 'clusters' dropdown in the nav bar.
 *
 */
function outputClusterLinkItems () {
  $dc = array_shift (getDCs ());
  foreach (getAllClusterInfo ($dc['dc']) as $row) {
    printf ("<li><a href=\"#%s\">%s</a><li>\n", $row['name'], $row['name']);
  }
}

/*
 * Function: outputSummaryTab
 *
 * This function outputs the pills styled nav tab that exists in the very
 * first summary section.  The tabs along the top contain one summary for each
 * data center, plus one for general HDFS info.
 *
 */
function outputSummaryTab () {
  $summaryTabLinkItems = returnSummaryTabLinkItems ();
  $summaryTabContent   = returnSummaryTabContent ();
  $hdfsTable            = returnHDFSTable ();

  print <<<EOF
  <div class="tabbable">
    <ul class="nav nav-pills nav-left110">
      $summaryTabLinkItems
      <li><a href="#summary-hdfs" data-toggle="tab">HDFS</a></li>
    </ul>
    <div class="tab-content">
      $summaryTabContent
      <div class="tab-pane" id="summary-hdfs">
        <table class="table left110 table-bordered table-striped" id="sumHDFS">
          $hdfsTable
        </table>
      </div>
    </div>
  </div>
EOF;
}

/*
 * Function: outputTableSorterInitLines
 *
 * Every table that we want to be sortable with the jquery tablesorter
 * plugin needs to be initialzed when the document is loaded. This
 * function outputs the initialization lines for these tables.
 *
 */
function outputTableSorterInitLines () {
  foreach (getDCs () as $dc) {
    printf ("$(\"#sumTable-%s\").tablesorter ({sortList:[[0, 0]]})\n",
	    $dc['dc']);

    foreach (getAllClusterInfo ($dc['dc']) as $row) {
      printf ("$(\"#%s-%s-bs-table\").tablesorter ({sortList:[[0, 1]]})\n",
	      $dc['dc'], $row['name']);
    }
    foreach (getBackupSetInfo ($dc['dc']) as $row) {
      printf ("$(\"#%s-%s-%s-bf-table\").tablesorter ({sortList:[[0, 0]]})\n",
	      $dc['dc'], $row['cluster'], $row['backup_date']);
    }
  }
}

/*
 * Function: outputSections
 *
 * This function iterates through all the cluster names and outputs
 * <section> sections for each one.
 *
 * It calls functions, which call functions that generate a fair bit
 * of HTML.  Each section has a page header that has the name of the
 * cluster and a description.  After that we generate the outermost
 * tabs which has tabs on the left -- one for each data center.
 * Inside these tabs we generate the innermost set of tabs (on the
 * top) one for for the 'Overview' tab and one for each existing
 * backup set.  Inside of these tabs there are tables with backup info
 * in them.
 *
 * Tables inside of tabs inside of tabs oh my!
 *
 * The code here is almost like a set of russian dolls, we output some
 * HTML, call a function, which ouputs some more HTML, and then calls
 * a function that outputs some more HTML, etc.  This is mostly done
 * so I can keep things straight, and the code doesn't get too gnarly.
 *
 */
function outputSections () {
  $dc = array_shift (getDCs ());
  foreach (getAllClusterInfo ($dc['dc']) as $row) {
    $cluster     = $row['name'];
    $description = $row['description'];

    $DCTabLinkItems = returnDCTabLinkItems ($cluster);
    $DCTabContent   = returnDCTabContent ($cluster);

    print <<<EOF
    <section id="$cluster">
      <div class="page-header"> <!-- offset1 -->
        <h1>$cluster <small>$description</small></h1>
      </div>
      <div class="row">
        <div class>
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs nav-tabs-scrunched">
              <!-- one link item for each data center -->
              $DCTabLinkItems
            </ul>
            <div class="tab-content">
              <!-- one set of tab content for each dc -->
              $DCTabContent
            </div>
          </div>
        </div>
      </div>
    </section>
EOF;
  }
}

/*
 * Function: returnDCTabLinkItems
 *
 * This function returns an anchor wrapped in a link item for each
 * data center.  This set of link items is used to populate the left
 * DC tabs in each section.
 *
 */
function returnDCTabLinkItems ($cluster) {
  $ret = '';
  $count = 0;

  foreach (getDCs () as $dcs) {
    $dc = $dcs['dc'];
    ++$count;

    $a = sprintf ("<a href=\"#%s-%s\" data-toggle=\"tab\">%s</a>",
		  $cluster, $dc, returnDCTabLabel ($cluster, $dc));
    $ret .= $count == 1 ? "<li class=\"active\">$a</li>\n" : "<li>$a</li>\n";
  }
  return $ret;
}

/*
 * Function: returnDCTabLabel
 *
 * This function returns a tab label for the left side tabs that show
 * at-a-glance the number of inprogress, incomplete, and complete
 * backups for a given data center and cluster.
 *
 */
function returnDCTabLabel ($cluster, $dc) {
  $bsc = getBackupStatusCounts ($cluster, $dc);
  $fmt = "<span class=\"label label-%s\">%d</span>";

  $statusmap = array ('inprogress' => 'warning',
		      'incomplete' => 'important',
		      'complete'   => 'success');
  $counts = '';
  foreach ($statusmap as $status => $label) {
    $counts .= $bsc[$status] > 0 ? sprintf ($fmt, $label, $bsc[$status]) : '';
  }
  return "<center>$dc $counts</center>";
}

/*
 * Function: returnDCTabContent
 *
 * This function iterates through the data centers and returns a 'tab
 * pane' class for each.  If the cluster doesn't exist in the data
 * center the tab will be empty.  The first one is always the active
 * tab.
 *
 */
function returnDCTabContent ($cluster) {
  $ret = '';
  $count = 0;

  foreach (getDCs () as $dcs) {
    ++$count;

    $dc    = $dcs['dc'];
    $class = $count == 1 ? 'tab-pane active' : 'tab-pane';
    $cinfo = returnClusterInfo ($cluster, $dc);
    $tabs  = returnTabs ($cluster, $dc);

    $ret .= <<<EOF
    <div class="$class" id="$cluster-$dc">
      <div class="tabbable">
        <div class="span12">
          $cinfo
          $tabs
        </div>
      </div>
    </div>
EOF;
  }
  return $ret;
}

/*
 * Function: returnClusterInfo
 *
 * This function returns some basic info about the cluster, and when
 * it is backed up.  Of course the cluster may not exist in the given
 * data center, in which case it will say so.
 *
 */
function returnClusterInfo ($cluster, $dc) {
  $row = getClusterInfo ($cluster, $dc);

  $when = sprintf ("%02d:00:00 UTC", $row['backup_hour']);
  $fmt_ne = "<p>The <em>%s</em> cluster does not exist in %s.</p>\n";
  $fmt_ok = "<p>The <em>%s</em> cluster is backed up in %s daily at %s.</p>\n";

  if (!$row) {
    return sprintf ($fmt_ne, $cluster, $dc);
  } else {
    return sprintf ($fmt_ok, $cluster, $dc, $when);
  }
}

/*
 * Function: returnTabs
 *
 * This function generates the inner set of tabs for a cluster. The
 * outer set has data centers on the left side, while this set has
 * backup sets (by date) along the top.
 *
 * We use the nav-pills style here for two reasons.  There is a bug in
 * Bootstrap 2.0 if you nest normal nav-tabs (on top) inside
 * 'tabs-left + nav-tabs'.  Your inner tabs come out on the left, and
 * it's a mess.  The second reason is that pills look cool.
 *
 */
function returnTabs ($cluster, $dc) {
  // short circuit if there are no backups for this cluster/dc
  if (!getBackupSetsCount ($cluster, $dc)) {
    return '';
  }
  $backupDateLinkItems   = returnBackupDateLinkItems ($cluster, $dc);
  $backupSetsTable       = returnBackupSetsTable ($cluster, $dc);
  $backupDatesTabContent = returnBackupDatesTabContent ($cluster, $dc);

  $ret = '';
  $ret .= <<<EOF
   <ul class="nav nav-pills">
     <li class="active" data-toggle="tab">
       <a href="#$dc-$cluster-ov" data-toggle="tab">Overview</a>
     </li>
     $backupDateLinkItems
   </ul>
   <div class="tab-content">
     <div class="tab-pane active" id="$dc-$cluster-ov">
       $backupSetsTable
     </div>
     $backupDatesTabContent
   </div>
EOF;
  return $ret;
}

/*
 * Function: returnBackupDatesTabContent
 *
 * This function returns the inner tab (backup dates) content, which
 * is a tab-pane div and a table that contains information about the
 * individual backup files that make up the backup set.
 *
 */
function returnBackupDatesTabContent ($cluster, $dc) {
  $ret = '';

  foreach (getBackupDates ($cluster, $dc) as $row) {
    $backup_date = $row['backup_date'];
    $backupFilesTable = returnBackupFilesTable ($cluster, $backup_date, $dc);

    $ret .= <<<EOF
    <div class="tab-pane" id="$dc-$cluster-$backup_date">
      $backupFilesTable
    </div>
EOF;
  }
  return $ret;
  $ret .= "</div>\n";
}

/*
 * Function returnBackupDateLinkItems
 *
 * This function returns the dates on the backup sets for a given
 * cluster and dc.  This is used for populating the top row of dates
 * on the inner tab.  Based on the status of the backup, these link
 * items will be styled differently.
 *
 */
function returnBackupDateLinkItems ($cluster, $dc) {
  $maxli = 7; $ret = ''; $count = 0;
  $dates = getBackupDates ($cluster, $dc);

  $statusmap = array ('INPROGRESS' => 'warning',
		      'INCOMPLETE' => 'important',
		      'COMPLETE'   => NULL);

  foreach ($dates as $row) {
    ++$count;
    $bdate  = $row['backup_date'];
    $fmt = "<span class=\"label label-%s\">%s</span>";

    $tabtxt = (isset ($statusmap[$row['status']])) ?
      sprintf ($fmt, $statusmap[$row['status']], $bdate) : $bdate;

    if (array_key_exists ('annotation', $row) &&
	!is_null ($row['annotation'])) {
      $extra = sprintf ("rel=\"popover\" data-content=\"%s\"",
			$row['annotation'], $text);
    } else {
      $extra = '';
    }
    if ($count === $maxli && count($dates) > $maxli) {
      $ret .= <<<EOF
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          More...<b class="caret"></b>
        </a>
      <ul class="dropdown-menu">
EOF;
    }
    $ret .= <<<EOF
    <li>
      <a href="#$dc-$cluster-$bdate" data-toggle="tab" $extra>
        $tabtxt
      </a>
    </li>
EOF;
  }
  if ($count >= $maxli && count($dates) > $maxli) {
    $ret .= "</ul></li>\n";
  }
  return $ret;
}

/*
 * Function: returnBackupSetsTable
 *
 * For a given cluster and dc, this function returns a table with some
 * 'Overview' information about the available backup sets.  This
 * populates the first pill in the innter tab.
 *
 */
function returnBackupSetsTable ($cluster, $dc) {
  $ret = '' ;
  $header = array ();
  $results = getBackupSets ($cluster, $dc, $header);
  $class = 'table table-bordered table-striped';

  $ret .= "<table class=\"$class\" id=\"$dc-$cluster-bs-table\">\n";
  $ret .= returnTableHeader ($header);
  $ret .= "<tbody>\n";
  foreach ($results as $row) {
    $ret .= returnTableRow ($header, $row);
  }
  $ret .= "</tbody>\n</table>\n";

  return $ret;
}

/*
 * Function: returnBackupFilesTable
 *
 * For a given cluster, date, and dc, this function returns a table
 * that contains all the information about the individual files that
 * make up a backup set.  These tables correspond to the pills in the
 * innter tab that come after the 'Overiew' pill and are arranged by
 * date.
 *
 */
function returnBackupFilesTable ($cluster, $bdate, $dc) {
  $ret = '';
  $header = array ();
  $results = getBackupFiles ($cluster, $dc, $bdate, $header);
  $class = "table table-left table-bordered table-striped";

  $ret .= "<table class=\"$class\" id=\"$dc-$cluster-$bdate-bf-table\">\n";

  $ret .= returnTableHeader ($header);
  $ret .= "<tbody>\n";
  foreach ($results as $row) {
    $ret .= returnTableRow ($header, $row);
  }
  $ret .= "</tbody>\n</table>\n";
  return $ret;
}

/*
 * Function: returnSummaryTabLinkItems
 *
 * This function returns the link items for the summary tab, which has
 * one tab for each data center, and one for HDFS.  The HDFS tab is
 * hardcoded elsewhere.
 *
 */
function returnSummaryTabLinkItems () {
  $ret = '';
  $count = 0;

  foreach (getDCs () as $dcs) {
    $dc = $dcs['dc'];
    ++$count;
    $a = "<a href=\"#summary-$dc\" data-toggle=\"tab\">$dc</a>";
    $ret .= $count == 1 ? "<li class=\"active\">$a</li>\n" : "<li>$a</li>\n";
  }
  return $ret;
}

/*
 * Function: returnSummaryTabContent
 *
 * This function returns the summary table content section, one
 * tab-pane div and table set for each data center.
 *
 */
function returnSummaryTabContent () {
  $ret = '';
  $count = 0;

  foreach (getDCs () as $dcs) {
    ++$count;
    $dc           = $dcs['dc'];
    $class        = $count == 1 ? 'tab-pane active' : 'tab-pane';
    $summaryTable = returnSummaryTable ($dc);
    $id           = "sumTable-$dc";

    $ret .= <<<EOF
    <div class="$class" id="summary-$dc">
      <table class="table left110 table-bordered table-striped" id="$id">
        $summaryTable
      </table>
    </div>
EOF;
  }
  return $ret;
}

/*
 * Function: returnSummaryTable
 *
 * This function returns the summary table for a given data center.
 * It's part of the tab content for the summary tab.
 *
 */
function returnSummaryTable ($dc) {
  $header = array();
  $ret = '';

  $results = getBackupSummary ($dc, $header);
  $ret .= returnTableHeader ($header);
  $ret .= "<tbody>\n";
  foreach ($results as $row) {
    $count = 0;
    $ret .= "<tr>\n";
    foreach ($header as $column) {
      ++$count;
      if ($count == 1) {
	$ret .= sprintf ("<td><a href=\"#%s\">%s (%s)</a></td>\n",
			 $row[$column], $row[$column], $row['description']);
      } else {
	$ret .= sprintf ("<td>%s</td>\n", $row[$column], $row[$column]);
      }
    }
    $ret .= "</tr>\n";
  }
  $ret .= "</tbody>\n";
  return $ret;
}

/*
 * Function: returnHDFSTable
 *
 * The HDFS Table is the very last tab in the summary nav-tab.  This
 * function populates the table contents.  It basically contains info
 * about free space in HDFS.  Used by functions that generate HTML
 * tables.
 *
 */
function returnHDFSTable () {
  $header = array();
  $ret = '';

  $results = getHDFSInfo ($header);
  $ret .= returnTableHeader ($header);
  $ret .= "<tbody>\n";
  foreach ($results as $row) {
    $ret .= returnTableRow ($header, $row);
  }
  $ret .= "</tbody>\n";

  return $ret;
}

/*
 * Function: returnTableHeader
 *
 * This function takes a passed in array of table column names and
 * builds an HTML table header based on that data.  This function gets
 * called by every function that generates an HTMLtable.
 *
 */
function returnTableHeader ($header) {
  $ret = "<thead><tr>\n";
  foreach ($header as $column) {
    $ret .= "<th>$column</th>\n";
  }
  $ret .= "</tr></thead>\n";
  return $ret;
}

/*
 * Function: returnTableRow
 *
 * Given an array containing the table columns and a database row hash
 * this function will return an HTML table row.  This function has an
 * additional feature where it will decorate the 'status' column with
 * a label, depending on if status is INPROGRESS, INCOMPLETE, or
 * COMPLETE.  This is used for both backup sets and backup files.
 *
 */
function returnTableRow ($header, $row) {
  $statusmap = array ('INPROGRESS' => 'warning',
		      'INCOMPLETE' => 'important',
		      'COMPLETE'   => 'success');

  $namemap   = array ('INPROGRESS' => 'in progress',
		      'INCOMPLETE' => 'incomplete',
		      'COMPLETE'   => 'complete');

  $ret = "<tr>\n";
  foreach ($header as $column) {
    if ($column === 'status') {
      $status = $row[$column];
      $st = sprintf ("<span class=\"label label-%s\">%s</span>",
		     $statusmap[$status], $namemap[$status]);

      $st = returnAnnotation ($row, $st);
      $ret .= sprintf ("<td>%s</td>\n", $st);
    } else {
      $ret .= sprintf ("<td>%s</td>\n", $row[$column]);
    }
  }
  $ret .= "</tr>\n";
  return $ret;
}

/*
 * Function: returnAnnotation
 *
 * If the passed in row contains an annotation we'll wrap the provided
 * text with a popover anchor with the annotation.  If not, we'll just
 * return the text provided to us.  This is done for 'status' columns
 * where the annotation can explain why the backup is broken.
 *
 */
function returnAnnotation ($row, $text) {
  $fmt = "<a href=\"#myModal\" data-toggle=\"modal\" rel=\"popover\" data-content=\"%s\">%s</a>";
  if (array_key_exists ('annotation', $row) && !is_null ($row['annotation'])) {
        return sprintf ($fmt, $row['annotation'], $text);
  } else {
    return $text;
  }
}

/*
 * Function: getBackupSets
 *
 * This function queries MySQL to get the information that populates
 * the 'Overview' tab, which has a summary of the various backup sets
 * that exist for a given cluster and data center.
 *
 */
function getBackupSets ($cluster, $dc, &$header = NULL) {
  $query = "SELECT b.cluster AS cluster,
                   b.backup_date AS backup_date,
                   status,
                   num_parts,
                   complete_parts,
                   CONCAT(complete_parts, '/' ,num_parts) as partitions,
                   ROUND(size/POW(1024,3),2) as size_gb,
                   annotation
              FROM backup_sets b
         LEFT JOIN annotations a USING (cluster, dc, backup_date)
             WHERE b.cluster = ?
               AND b.dc = ?
          ORDER BY b.backup_date DESC";

  if (!is_null ($header)) {
    $header = array('backup_date', 'partitions', 'size_gb', 'status');
  }
  return doQuery ($query, array ($cluster, $dc));
}

/*
 * Function: getBackupFiles
 *
 * This function queries MySQL to get the information that populates
 * the table that shows the individual files that make up a backup set
 * for a given cluster, data center, and date.
 *
 */
function getBackupFiles ($cluster, $dc, $backup_date, &$header = NULL) {
  $query = " SELECT partition AS '#',
                    stat AS creation_date,
                    name,
                    CONCAT(ROUND(size/POW(1024,3),2), ' ', 'GB') as size,
                    status
               FROM backup_files
              WHERE cluster = ?
                AND dc = ?
                AND backup_date = ?
           ORDER BY partition";

  if (!is_null ($header)) {
    $header = array('#', 'creation_date', 'name', 'size', 'status');
  }
  return doQuery ($query, array ($cluster, $dc, $backup_date));
}

/*
 * Function: getBackupSummary
 *
 * This function queries MySQL to get the information that populates
 * the 'Summary' table that exists in the very first section of the
 * page for a given data center.
 *
 */
function getBackupSummary ($dc, &$header = NULL) {
  $q = "SELECT bs.cluster AS cluster,
               description,
               oldest_backup AS 'oldest backup',
               newest_backup AS 'newest backup',
               COUNT(*) AS total,
               IFNULL(bsi.total_incomplete, 0) AS incomplete,
               IFNULL(bsip.total_inprogress, 0) AS inprogress,
               IFNULL(bsc.total_complete, 0) AS complete,
               CONCAT(ROUND(SUM(bs.size)/POW(1024,4),2),' TB') AS 'total size'
          FROM backup_sets bs
     LEFT JOIN (
                 SELECT  cluster,
                         COUNT(*) AS 'total_incomplete'
                    FROM backup_sets
                   WHERE status = 'INCOMPLETE'
                     AND dc = ?
                GROUP BY cluster
               ) bsi ON (bs.cluster = bsi.cluster)
     LEFT JOIN (
                 SELECT  cluster,
                         COUNT(*) AS total_inprogress
                    FROM backup_sets
                   WHERE status = 'INPROGRESS'
                     AND dc = ?
                GROUP BY cluster
               ) bsip ON (bs.cluster = bsip.cluster)
     LEFT JOIN (
                 SELECT  cluster,
                         COUNT(*) AS total_complete,
                         MIN(backup_date) AS oldest_backup,
                         MAX(backup_date) AS newest_backup
                    FROM backup_sets
                   WHERE status = 'COMPLETE'
                     AND dc = ?
                GROUP BY cluster
               ) bsc ON (bs.cluster = bsc.cluster)
          JOIN clusters ON (bs.cluster = clusters.name)
         WHERE bs.dc = ?
      GROUP BY bs.cluster
      ORDER BY 'total size' desc";

  if (!is_null ($header)) {
    $header = array('cluster', 'oldest backup', 'newest backup', 'inprogress',
		    'incomplete', 'complete', 'total size');
  }
  return doQuery ($q, array ($dc, $dc, $dc, $dc));
}

/*
 * Function: getBackupStatusCounts
 *
 * This function queries MySQL to get the information used to draw the
 * colored counts of incomplete, inprogress, and complete backups for
 * a given cluster and data center that appear on the left side tabs
 * that exist for each data center.
 *
 */
function getBackupStatusCounts ($cluster, $dc, &$header = NULL) {
  $query = "SELECT bs.cluster AS cluster,
                   IFNULL(bsi.total_incomplete, 0) AS incomplete,
                   IFNULL(bsip.total_inprogress, 0) AS inprogress,
                   IFNULL(bsc.total_complete, 0) AS complete
              FROM backup_sets bs
         LEFT JOIN (
                     SELECT  cluster,
                             COUNT(*) AS 'total_incomplete'
                        FROM backup_sets
                       WHERE status = 'INCOMPLETE'
                         AND dc = ?
                    GROUP BY cluster
                   ) bsi ON (bs.cluster = bsi.cluster)
         LEFT JOIN (
                     SELECT  cluster,
                             COUNT(*) AS total_inprogress
                        FROM backup_sets
                       WHERE status = 'INPROGRESS'
                         AND dc = ?
                    GROUP BY cluster
                   ) bsip ON (bs.cluster = bsip.cluster)
         LEFT JOIN (
                     SELECT  cluster,
                             COUNT(*) AS total_complete
                        FROM backup_sets
                       WHERE status = 'COMPLETE'
                         AND dc = ?
                    GROUP BY cluster
                   ) bsc ON (bs.cluster = bsc.cluster)
              JOIN clusters ON (bs.cluster = clusters.name)
             WHERE bs.dc = ?
             AND   bs.cluster = ?
          GROUP BY bs.cluster";

  if (!is_null ($header)) {
    $header = array('cluster', 'inprogress', 'incomplete', 'complete');
  }
  return array_shift (doQuery ($query, array ($dc, $dc, $dc, $dc, $cluster)));
}

/*
 * Function: getLastUpdated
 *
 * This function uses a janky method to query MySQL to figure out when
 * the last time the data was updated.  This information exists in the
 * nav bar up top.
 *
 */
function getLastUpdated () {
  $query = 'SELECT created FROM clusters LIMIT 1';
  return doQuery ($query);
}

/*
 * Function: getHDFSInfo
 *
 * This function queries MySQL to get the information used to populate
 * the 'HDFS' tab in the summary section.
 *
 */
function getHDFSInfo (&$header = NULL) {
  $q = " SELECT bs.dc AS dc,
                CONCAT(ROUND(SUM(bs.size) / POW(1024, 4), 2), ' TB')
             AS 'backup size',
                CONCAT(ROUND(hdfs_df.size / POW(1024, 4), 2), ' TB')
             AS 'hdfs size',
                CONCAT(ROUND(hdfs_df.used / POW(1024, 4), 2), ' TB')
             AS 'hdfs used',
                 CONCAT(ROUND(hdfs_df.avail / POW(1024, 4), 2), ' TB')
             AS 'hdfs free',
                 CONCAT(ROUND((SUM(bs.size) / hdfs_df.size) * 100, 0), '%')
             AS 'backup utilization',
                `use`
             AS 'hdfs utilizaton'
            FROM backup_sets bs
       LEFT JOIN hdfs_df USING (dc)
        GROUP BY dc
        ORDER BY bs.size DESC";

  if (!is_null ($header)) {
    $header = array('dc', 'hdfs size', 'backup size', 'backup utilization',
		    'hdfs used', 'hdfs free', 'hdfs utilizaton');
  }
  return (doQuery ($q));
}

/*
 * Function: getBackupSetInfo
 *
 * This function queries MySQL to get information about backup sets
 * for a given data center.
 *
 */
function getBackupSetInfo ($dc) {
  $query = "SELECT cluster, backup_date FROM backup_sets WHERE dc = ?";
  return doQuery ($query, array ($dc));
}

/*
 * Function: getClusterInfo
 *
 * This function queries MySQL to get everything from the clusters
 * table for a given cluster and data center.
 *
 * At one point clusters that weren't backed up were actually stored
 * in the clusters table, thus the 'AND backed_up = 1' clause.  This
 * is likely no longer necessary.  Fixfix.
 *
 */
function getClusterInfo ($cluster, $dc) {
  $query = "SELECT *
              FROM clusters
             WHERE name = ?
               AND backed_up = 1
               AND dc = ?";

  return array_shift (doQuery ($query, array ($cluster, $dc)));
}

/*
 * Function: getAllClusterInfo
 *
 * Returns information about all clusters for a given data center.
 * The 'AND backed_up = 1' clause is likely bogus. Fixfix.
 *
 */

function getAllClusterInfo ($dc) {
  $query = "SELECT * FROM clusters WHERE backed_up = 1 AND dc = ?";
  return doQuery ($query, array ($dc));
}

/*
 * Function: getBackupDates
 *
 * For a given cluster and data center, query MySQL and get the date
 * and status of all backup sets.  These dates are used to populate
 * the pills along the top row of the inner tab.
 *
 */
function getBackupDates ($cluster, $dc) {
  $query = "SELECT b.backup_date AS backup_date,
                   status,
                   annotation
              FROM backup_sets b
         LEFT JOIN annotations a USING (cluster, dc, backup_date)
             WHERE cluster = ?
               AND dc = ?
          ORDER BY backup_date DESC";
  return doQuery ($query, array ($cluster, $dc));
}

/*
 * Function: getDCs
 *
 * This function returns a list of data centers that exist in the
 * system.  Importantly, they're ordered by which data center has the
 * largest number of cluster backups.  The idea is that the first data
 * center in the list can be used to retreive the canonical list of
 * clusters.
 *
 */
function getDCs () {
  $sql = "SELECT DISTINCT dc
            FROM clusters
        GROUP BY name
        ORDER BY count(name)";
  return doQuery ($sql);
}

/*
 * Fucntion: getBackupSetsCount
 *
 * This function returns a count of backup sets for a given cluster
 * and data center.  Some clusters don't exist in some data centers,
 * and this function can quickly let us know if that's the case.
 *
 */
function getBackupSetsCount ($cluster, $dc) {
  $sql = "SELECT count(*) AS count
            FROM backup_sets
           WHERE cluster = ?
             AND dc = ?";

  $row = array_shift (doQuery ($sql, array ($cluster, $dc)));
  return $row['count'];
}

/*
 * Function: doQuery
 *
 * This function takes an SQL query, and an optional set of arguments
 * used to fill in positional parameters indicated by question marks
 * in the query.  It always returns an array of hashes, even if the
 * result set contains only one row.
 *
 * This function should probably do some rudimentary error checking.
 * Fixfix.
 *
 */
function doQuery ($query, $args = NULL) {
  $dbh = getDBHandle ();
  $ret = array ();

  $stmt = $dbh->prepare ($query);
  if (is_null ($args)) {
    $stmt->execute ();
  } else {
    $stmt->execute ($args);
  }
  while ($row = $stmt->fetch (PDO::FETCH_ASSOC)) {
    array_push ($ret, $row);
  }
  return ($ret);
}

/*
 * Function: getDBHandle
 *
 * The first time through, this function connects to MySQL using the
 * credentials below.  Subsequent calls simply return the previously
 * opened db handle.
 *
 */
function getDBHandle () {
  static $dbh = NULL;

  if (is_null ($dbh)) {
    $schema = constant ('SCHEMA');
    $dbhost = constant ('DBHOST');
    $user   = constant ('USER');
    $pwd    = constant ('PWD');

    $dbh = new PDO ("mysql:dbname=$schema;host=$dbhost", $user, $pwd);
  }
  return ($dbh);
}

?>
