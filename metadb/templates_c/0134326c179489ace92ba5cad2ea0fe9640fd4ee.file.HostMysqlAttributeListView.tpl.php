<?php /* Smarty version Smarty-3.1.7, created on 2013-02-09 17:20:59
         compiled from "/Library/WebServer/Documents/metadb/templates/HostMysqlAttributeListView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19134620395116f5fbc44f44-46621944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0134326c179489ace92ba5cad2ea0fe9640fd4ee' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/HostMysqlAttributeListView.tpl',
      1 => 1360459108,
      2 => 'file',
    ),
    'bb575e0d1791b4041ac6b247254e8260b86eaad0' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/Master.tpl',
      1 => 1360459108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19134620395116f5fbc44f44-46621944',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5116f5fbcfd26',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5116f5fbcfd26')) {function content_5116f5fbcfd26($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>DBA METADB | HostMysqlAttributes</title>
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
	.script("scripts/app/hostmysqlattributes.js").wait(function(){
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

		
	<?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("hostmysqlattributes", null, 0);?>


			<?php if (!isset($_smarty_tpl->tpl_vars['nav']->value)){?><?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("home", null, 0);?><?php }?>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./">DBA METADB</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnameservers'){?> class="active"<?php }?>><a href="./cnameservers">CnameServers</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnames'){?> class="active"<?php }?>><a href="./cnames">Cnames</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostmysqlattributes'){?> class="active"<?php }?>><a href="./hostmysqlattributes">HostMysqlAttributes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostnotes'){?> class="active"<?php }?>><a href="./hostnotes">HostNotes</a></li>
							</ul>
							<ul class="nav">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hosts'){?> class="active"<?php }?>><a href="./hosts">Hosts</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='mysqlattributes'){?> class="active"<?php }?>><a href="./mysqlattributes">MysqlAttributes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='servers'){?> class="active"<?php }?>><a href="./servers">Servers</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='vipservers'){?> class="active"<?php }?>><a href="./vipservers">VipServers</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='viphosts'){?> class="active"<?php }?>><a href="./viphosts">Viphosts</a></li>
								</ul>
								</li>
							</ul>

							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a href="./loginform">Login</a></li>
									<li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
									<li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		

		
			<div class="container">

				
	<h1>
		<i class="icon-th-list"></i> HostMysqlAttributes
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>


				

	<!-- underscore template for the collection -->
	<script type="text/template" id="hostMysqlAttributeCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_HostId">Host Id<<?php ?>% if (page.orderBy == 'HostId') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_MysqlAttributeId">Mysql Attribute Id<<?php ?>% if (page.orderBy == 'MysqlAttributeId') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Value">Value<<?php ?>% if (page.orderBy == 'Value') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_UpdatedAt">Updated At<<?php ?>% if (page.orderBy == 'UpdatedAt') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
			</tr>
		</thead>
		<tbody>
		<<?php ?>% items.each(function(item) { %<?php ?>>
			<tr id="<<?php ?>%= _.escape(item.get('hostId')) %<?php ?>>">
				<td><<?php ?>%= _.escape(item.get('hostId') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('mysqlAttributeId') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('value') || '') %<?php ?>></td>
				<td><<?php ?>%if (item.get('updatedAt')) { %<?php ?>><<?php ?>%= _date(app.parseDate(item.get('updatedAt'))).format('MMM D, YYYY h:mm A') %<?php ?>><<?php ?>% } else { %<?php ?>>NULL<<?php ?>% } %<?php ?>></td>
			</tr>
		<<?php ?>% }); %<?php ?>>
		</tbody>
		</table>

		<<?php ?>%=  view.getPaginationHtml(page) %<?php ?>>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="hostMysqlAttributeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="hostIdInputContainer" class="control-group">
					<label class="control-label" for="hostId">Host Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hostId" placeholder="Host Id" value="<<?php ?>%= _.escape(item.get('hostId') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlAttributeIdInputContainer" class="control-group">
					<label class="control-label" for="mysqlAttributeId">Mysql Attribute Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mysqlAttributeId" placeholder="Mysql Attribute Id" value="<<?php ?>%= _.escape(item.get('mysqlAttributeId') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valueInputContainer" class="control-group">
					<label class="control-label" for="value">Value</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="value" placeholder="Value" value="<<?php ?>%= _.escape(item.get('value') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="updatedAtInputContainer" class="control-group">
					<label class="control-label" for="updatedAt">Updated At</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="updatedAt" type="text" value="<<?php ?>%= _date(app.parseDate(item.get('updatedAt'))).format('YYYY-MM-DD') %<?php ?>>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="updatedAt-time" type="text" class="timepicker-default input-small" value="<<?php ?>%= _date(app.parseDate(item.get('updatedAt'))).format('h:mm A') %<?php ?>>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteHostMysqlAttributeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteHostMysqlAttributeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete HostMysqlAttribute</button>
						<span id="confirmDeleteHostMysqlAttributeContainer" class="hide">
							<button id="cancelDeleteHostMysqlAttributeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteHostMysqlAttributeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="hostMysqlAttributeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit HostMysqlAttribute
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="hostMysqlAttributeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveHostMysqlAttributeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="hostMysqlAttributeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newHostMysqlAttributeButton" class="btn btn-primary">Add HostMysqlAttribute</button>
	</p>



				<hr>

				<footer>
					<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 DBA METADB</p>
				</footer>

			</div> <!-- /container -->

		

		
		

	</body>
</html><?php }} ?>