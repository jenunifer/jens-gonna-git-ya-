document.write('\
\
<a href=./index.php?refresh=300>Home</a>, \
<a href=addressbook.php>Addressbook</a>, \
<a href=./slb_hosts.php?rrd=apache_200api_count&labels=all>SLB Hosts</a>, \
<a href=./search.php?cluster=hp>Search</a>, \
<a href=http://ganglia.smf1.twitter.com/exceptions.php?v=web>Errs</a>, \
<a href=http://ganglia.smf1.twitter.com/exceptions_search.php>Search Errs</a>, \
<a href=./databases.php?report=day_1>DBs</a>, \
<a href=http://dba-dashboard.twitter.biz/>DBs New</a>, \
<a href=./queues.php>Queues</a>, \
<a href=./timeout.php>Service Timeouts</a>, \
<a href=./search-queues.php>Search Queues</a>, \
<a href=./haplo.html>Haplocheirus</a>, \
<a href=./flock.php>Flock</a>, \
<a href=./t-flock.php>T-Flock</a>, \
<a href=./tbird.php>Tbird</a>, \
<a href=./hosebird/hosebird_smf1_summary.html>Hosebird</a>, \
<a href=./photurkey.html>Photurkey</a>, \
<a href=./rockdove.html>Rockdove</a>, \
<a href=ads.html>Ads</a>, \
<a href=./kestrel/index.php>Kestrel</a>, \
<a href=./mail.php>Mail</a>, \
<a href=./expertsearch.php>ExpertSearch</a>, \
<a href=./scribe.php?hour=4>Scribe</a>, \
<a href=./puppet.html>Puppet</a>, \
<a href=./user_reputations/index.html>User Rep</a>, \
<a href=./cassowary/compute.php>Cassowary</a>, \
<a href=./pheasant.php>Pheasant</a>, \
<a href=./snowflake.html>Snowflake</a>, \
<a href=./tweetbuttonapi.html>Tweet Button API</a>, \
<a href=./spiderduck.php>Spiderduck</a>, \
<a href=./cuckoo.html>Cuckoo</a>, \
<a href=http://ganglia.smf1.twitter.com>Ganglia</a>, \
<a href=https://nagios.twitter.com>Nagios</a>, \
<a href=https://dirtybird.twitter.com/>IP ban (dirtybird)</a> \
\
');

function graph(cluster, name, span, label) {
  document.write('<a href="http://ganglia.local.twitter.com/?c=' + cluster + '&amp;m=' +
    name + '&amp;r=' + span + '&amp;n=0&amp;s=ascending&amp;sh=1&amp;hc=4">');
  document.write('<img src="http://ganglia.local.twitter.com/graph.php?&amp;c=' + cluster +
    '&amp;h=__SummaryInfo__&amp;m=' + name + '&amp;r=' + span +
    '&amp;n=0&amp;z=&amp;vl=' + label + '" />\n');
  document.write('</a>');
}

function graph_line(cluster, label, name) {
  document.write('<div class="graph">\n');
  graph(cluster, name, 'hour', label);
  graph(cluster, name, 'day', label);
  graph(cluster, name, 'week', label);
  if (arguments.length > 3) {
    document.write('<b>' + arguments[3] + '</b>');
  }
  document.write('</div>\n');
}

function graphs(title, cluster, label) {
  document.write('<h2>' + title + '</h2>\n');
  for (var i = 3; i < arguments.length; i++) {
    graph_line(cluster, label, arguments[i]);
  }
}

function graph_host(cluster, name, span, label, host) {
  document.write('<a href="http://ganglia.local.twitter.com/?c=' + cluster + '&amp;m=' +
    name + '&amp;r=' + span + '&amp;n=0&amp;s=ascending&amp;sh=1&amp;hc=4">');
  document.write('<img src="http://ganglia.local.twitter.com/graph.php?&amp;c=' + cluster +
    '&amp;h=' + host + '&amp;m=' + name + '&amp;r=' + span +
    '&amp;n=0&amp;z=&amp;vl=' + label + '" />\n');
  document.write('</a>');
}

function graph_line_host(cluster, label, name, host) {
  document.write('<div class="graph">\n');
  graph_host(cluster, name, 'hour', label, host);
  graph_host(cluster, name, 'day', label, host);
  graph_host(cluster, name, 'week', label, host);
  if (arguments.length > 4) {
    document.write('<b>' + arguments[4] + '</b>');
  }
  document.write('</div>\n');
}

function graphs_host(title, cluster, label, host) {
  document.write('<h2>' + title + '</h2>\n');
  for (var i = 4; i < arguments.length; i++) {
    graph_line_host(cluster, label, arguments[i], host);
  }
}

function tgraph(title, span, label, stat_name, controllers) {
  var stat_fullnames = new Array();
  for (i in controllers) { stat_fullnames[i] = controllers[i] + "--" + stat_name + "--sum"; }

  document.write('<a href="http://ganglia.local.twitter.com/tgraph.php?report=' + span +
    '&amp;rrdpath=log/a002.twitter.com&amp;h=400&amp;w=800&amp;title=' +
    title.replace(/ /g, '%20') + '&amp;multiply_by=10&amp;divide_by=300&vlabel=' + label +
    '/sec&amp;rrd=' + stat_fullnames.join(',') +
    '&amp;aggregate=1&amp;labels=' + label + '">\n');
  document.write('<img src="http://ganglia.local.twitter.com/tgraph.php?report=' + span +
    '&amp;rrdpath=log/a002.twitter.com&amp;h=52&amp;w=275&amp;title=' +
    title.replace(/ /g, '%20') + '&amp;multiply_by=10&amp;divide_by=300&vlabel=' + label +
    '/sec&amp;rrd=' + stat_fullnames.join(',') +
    '&amp;aggregate=1&amp;labels=' + label + '" />\n');
  document.write('</a>\n');
}

function tgraph_line(title, label, stat_name, controllers) {
  document.write('<div class="graph">\n');
  tgraph(title, 'hour_1', label, stat_name, controllers);
  tgraph(title, 'day_1', label, stat_name, controllers);
  tgraph(title, 'week_1', label, stat_name, controllers);
  document.write('</div>\n');
}
