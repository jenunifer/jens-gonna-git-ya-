<?php /* Smarty version Smarty-3.1.7, created on 2013-02-09 18:55:47
         compiled from "/Library/WebServer/Documents/metadb/templates/CnameServerListView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:588595015116f5f7d04258-05596252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '444684733071e13fc92d00260b1e8e5f9d1b008f' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/CnameServerListView.tpl',
      1 => 1360459108,
      2 => 'file',
    ),
    'bb575e0d1791b4041ac6b247254e8260b86eaad0' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/Master.tpl',
      1 => 1360464924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '588595015116f5f7d04258-05596252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5116f5f7db6da',
  'variables' => 
  array (
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5116f5f7db6da')) {function content_5116f5f7db6da($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>DBA METADB | CnameServers</title>
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
	.script("scripts/app/cnameservers.js").wait(function(){
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

		
	<?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("cnameservers", null, 0);?>


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
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hosts'){?> class="active"<?php }?>><a href="./hosts">Hosts</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='mysqlattributes'){?> class="active"<?php }?>><a href="./mysqlattributes">Mysql Attributes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostmysqlattributes'){?> class="active"<?php }?>><a href="./hostmysqlattributes">HostMysqlAttributes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostnotes'){?> class="active"<?php }?>><a href="./hostnotes">Notes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnames'){?> class="active"<?php }?>><a href="./cnames">Cnames</a></li>
							<!--<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cnameservers'){?> class="active"<?php }?>><a href="./cnameservers">CnameServers</a></li> -->
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
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='hostmysqlattributes'){?> class="active"<?php }?>><a href="./hostmysqlattributes">HostMysqlAttributes</a></li>
								</ul>
								</li>
							</ul>

							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a href="./loginform">Login</a></li>
									<li><a href="./secureuser">User Page <i class="icon-lock"></i></a></li>
									<li><a href="./secureadmin">Admin Page <i class="icon-lock"></i></a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		

		
			<div class="container">

				
	<h1>
		<i class="icon-th-list"></i> CnameServers
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>


				

	<!-- underscore template for the collection -->
	<script type="text/template" id="cnameServerCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_CnameId">Cname Id<<?php ?>% if (page.orderBy == 'CnameId') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_ServerId">Server Id<<?php ?>% if (page.orderBy == 'ServerId') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
			</tr>
		</thead>
		<tbody>
		<<?php ?>% items.each(function(item) { %<?php ?>>
			<tr id="<<?php ?>%= _.escape(item.get('cnameId')) %<?php ?>>">
				<td><<?php ?>%= _.escape(item.get('cnameId') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('serverId') || '') %<?php ?>></td>
			</tr>
		<<?php ?>% }); %<?php ?>>
		</tbody>
		</table>

		<<?php ?>%=  view.getPaginationHtml(page) %<?php ?>>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="cnameServerModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="cnameIdInputContainer" class="control-group">
					<label class="control-label" for="cnameId">Cname Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cnameId" placeholder="Cname Id" value="<<?php ?>%= _.escape(item.get('cnameId') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="serverIdInputContainer" class="control-group">
					<label class="control-label" for="serverId">Server Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="serverId" placeholder="Server Id" value="<<?php ?>%= _.escape(item.get('serverId') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCnameServerButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCnameServerButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete CnameServer</button>
						<span id="confirmDeleteCnameServerContainer" class="hide">
							<button id="cancelDeleteCnameServerButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCnameServerButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="cnameServerDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit CnameServer
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="cnameServerModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCnameServerButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="cnameServerCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCnameServerButton" class="btn btn-primary">Add CnameServer</button>
	</p>



				<hr>

				<footer>
					<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 DBA METADB</p>
				</footer>

			</div> <!-- /container -->

		

		
		

	</body>
</html><?php }} ?>