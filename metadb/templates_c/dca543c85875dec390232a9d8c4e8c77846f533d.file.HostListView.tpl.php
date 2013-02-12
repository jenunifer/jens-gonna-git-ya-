<?php /* Smarty version Smarty-3.1.7, created on 2013-02-11 22:17:25
         compiled from "/Library/WebServer/Documents/metadb/templates/HostListView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6505517625116f77cb6f203-89088409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dca543c85875dec390232a9d8c4e8c77846f533d' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/HostListView.tpl',
      1 => 1360649840,
      2 => 'file',
    ),
    'bb575e0d1791b4041ac6b247254e8260b86eaad0' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/Master.tpl',
      1 => 1360609189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6505517625116f77cb6f203-89088409',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5116f77cc471d',
  'variables' => 
  array (
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5116f77cc471d')) {function content_5116f77cc471d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>DBA METADB | Hosts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="DBA METADB" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB
				.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js");
		</script>

	

	
<script type="text/javascript">
	$LAB.script("bootstrap/js/bootstrap-datepicker.js")
	.script("bootstrap/js/bootstrap-timepicker.js")
	.script("bootstrap/js/bootstrap-combobox.js")
	.script("scripts/libs/underscore-min.js").wait()
	.script("scripts/libs/underscore.date.min.js")
	.script("scripts/libs/backbone-min.js")
	.script("scripts/app.js")
	.script("scripts/model.js").wait()
	.script("scripts/view.js").wait()
	.script("scripts/app/hosts.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});

		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>


	</head>

	<body>

		
	<?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("hosts", null, 0);?>


			<?php if (!isset($_smarty_tpl->tpl_vars['nav']->value)){?><?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("home", null, 0);?><?php }?>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<img src="images/twbird.png"</img>
							<a class="brand"><href="./">DBA METADB Site</a>
							<ul class="nav">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hosts'){?> class="active"<?php }?>><a href="./hosts">Hosts</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostnotes'){?> class="active"<?php }?>><a href="./hostnotes">Notes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnames'){?> class="active"<?php }?>><a href="http://confluence.local.twitter.com/display/DBA/Home">DBA Wiki</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnameservers'){?> class="active"<?php }?>><a href="http://dba-dashboard.twitter.biz">DBA Dashboard</a></li>
							</ul>
						<ul class="nav">
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='mysqlattributes'){?> class="active"<?php }?>><a href="./mysqlattributes">Attribute List</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='servers'){?> class="active"<?php }?>><a href="./servers">Servers</a></li>
								<!-- ><li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='vipservers'){?> class="active"<?php }?>><a href="./vipservers">VipServers</a></li>-->
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='viphosts'){?> class="active"<?php }?>><a href="./viphosts">VIP Hosts</a></li>
							</ul>
						</ul>	
					 	<ul class="nav pull-right">
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>	
							<ul class="dropdown-menu">
								<li><a href="./loginform">Login</a></li>
								<li><a href="./secureuser">User Page <i class="icon-lock"></i></a></li>
								<li><a href="./secureadmin">Admin Page <i class="icon-lock"></i></a></li>
							</ul>	
						</ul>		
			</div><!--/.nav-collapse -->
		</div>
	</div>
	

		
			<div class="container">

				
	<h3>
		<i class="icon-th-list"></i> All Hosts
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h3>


				

	<!-- underscore template for the collection -->
	<script type="text/template" id="hostCollectionTemplate">
		<div class="container-fluid">
		<table class="collection table table-bordered table-condensed">
		<thead>
			<tr>
				<th>Status<<?php ?>% if (page.orderBy == 'badge') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>			
				<th id="header_Id">Id<<?php ?>% if (page.orderBy == 'Id') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Fqdn">Hostname<<?php ?>% if (page.orderBy == 'Fqdn') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_MysqlDbCluster">Mysql Cluster<<?php ?>% if (page.orderBy == 'MysqlDbCluster') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_MysqlDbClusterPart">Gizzard (partition)<<?php ?>% if (page.orderBy == 'MysqlDbClusterPart') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
			 	<th id="header_NewRole">New Role<<?php ?>% if (page.orderBy == 'NewRole') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Type">Type<<?php ?>% if (page.orderBy == 'Type') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Platform">Platform<<?php ?>% if (page.orderBy == 'Platform') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_UnmonitoredUntil">Monitored status<<?php ?>% if (page.orderBy == 'UnmonitoredUntil') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Notes">Ticket\Note<<?php ?>% if (page.orderBy == 'n_notes') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>


			</tr>
		</thead>
		<tbody>
		<<?php ?>% items.each(function(item) { %<?php ?>>
			<tr id="<<?php ?>%= _.escape(item.get('id')) %<?php ?>>">
				<td><<?php ?>%if (item.get('unmonitoredUntil') > 0) { %<?php ?>><i class="badge badge-successful"><<?php ?>% } else { %<?php ?>><i class="badge badge-important"><<?php ?>% } %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('id') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('fqdn') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('mysqlDbCluster') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('mysqlDbClusterPart') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('newRole') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('type') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('platform') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('unmonitoredUntil') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('n_Notes') || '') %<?php ?>></td>


			</tr>
		<<?php ?>% }); %<?php ?>>
		</tbody>
		</table>
		<<?php ?>%=  view.getPaginationHtml(page) %<?php ?>>
	</script>
</div>
	<!-- underscore template for the model -->
	<script type="text/template" id="hostModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><<?php ?>%= _.escape(item.get('id') || '') %<?php ?>></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fqdnInputContainer" class="control-group">
					<label class="control-label" for="fqdn">Fqdn</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="fqdn" placeholder="Fqdn" value="<<?php ?>%= _.escape(item.get('fqdn') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbCluster">Mysql Db Cluster</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="mysqlDbCluster" placeholder="Mysql Db Cluster" value="<<?php ?>%= _.escape(item.get('mysqlDbCluster') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterPartInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbClusterPart">Mysql Db Cluster Part</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="mysqlDbClusterPart" placeholder="Mysql Db Cluster Part" value="<<?php ?>%= _.escape(item.get('mysqlDbClusterPart') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="platformInputContainer" class="control-group">
					<label class="control-label" for="platform">Platform</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="platform" placeholder="Platform" value="<<?php ?>%= _.escape(item.get('platform') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="unmonitoredUntilInputContainer" class="control-group">
					<label class="control-label" for="unmonitoredUntil">Unmonitored Until</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="unmonitoredUntil" placeholder="Unmonitored Until" value="<<?php ?>%= _.escape(item.get('unmonitoredUntil') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="roleInputContainer" class="control-group">
					<label class="control-label" for="role">Role</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="role" placeholder="Role" value="<<?php ?>%= _.escape(item.get('role') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="updatedAtInputContainer" class="control-group">
					<label class="control-label" for="updatedAt">Last Update</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="updatedAt" type="text" value="<<?php ?>%= _date(app.parseDate(item.get('updatedAt'))).format('YYYY-MM-DD') %<?php ?>>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
							<input id="updatedAt-time" type="text" class="timepicker-default input-small uneditable-input" value="<<?php ?>%= _date(app.parseDate(item.get('updatedAt'))).format('h:mm A') %<?php ?>>" />
							<span><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="newRoleInputContainer" class="control-group">
					<label class="control-label" for="newRole">New Role</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="newRole" placeholder="New Role" value="<<?php ?>%= _.escape(item.get('newRole') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeInputContainer" class="control-group">
					<label class="control-label" for="type">Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="type" placeholder="Type" value="<<?php ?>%= _.escape(item.get('type') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>

				<div id="puppetBranchInputContainer" class="control-group">
					<label class="control-label" for="puppetBranch">Puppet Branch</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="puppetBranch" placeholder="Puppet Branch" value="<<?php ?>%= _.escape(item.get('puppetBranch') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>
		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteHostButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteHostButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Host</button>
						<span id="confirmDeleteHostContainer" class="hide">
							<button id="cancelDeleteHostButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteHostButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="hostDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Host
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="hostModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveHostButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="hostCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newHostButton" class="btn btn-primary">Add Host</button>
	</p>



				<hr>

				<footer>
					<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 DBA METADB</p>
				</footer>

			</div> <!-- /container -->

		

		
		

	</body>
</html><?php }} ?>