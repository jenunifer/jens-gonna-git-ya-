<?php /* Smarty version Smarty-3.1.7, created on 2013-02-11 16:26:37
         compiled from "/Library/WebServer/Documents/metadb/templates/DefaultErrorFatal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212159583151198c3d9f32a6-02689226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '844b15702685b16276e9cad369621ebefd296993' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/DefaultErrorFatal.tpl',
      1 => 1360459108,
      2 => 'file',
    ),
    'bb575e0d1791b4041ac6b247254e8260b86eaad0' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/Master.tpl',
      1 => 1360609189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212159583151198c3d9f32a6-02689226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ROOT_URL' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_51198c3da6dfa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51198c3da6dfa')) {function content_51198c3da6dfa($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.nl2br.php';
if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>Error</title>
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

	

	
	

	</head>

	<body>

		

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

				
	<h1>Oh Snap!</h1>


				

	<!-- this is used by app.js for scraping -->
	<!-- ERROR <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
 /ERROR -->

	<h2><i class="icon-cogs"></i> Oh Snap!</h2>

	<h3 onclick="$('#stacktrace').show('slow');" class="well" style="cursor: pointer;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
</h3>

	<p>You may want to try returning to the the previous page and verifying that
	all fields have been filled out correctly.</p>

	<p>If you continue to experience this error please contact support.</p>

	<div id="stacktrace" class="well hide">
		<p style="font-weight: bold;">Stack Trace:</p>
		<?php if ($_smarty_tpl->tpl_vars['stacktrace']->value){?>
			<p style="white-space: nowrap; overflow: auto; padding-bottom: 15px; font-family: courier new, courier; font-size: 8pt;"><?php echo smarty_modifier_nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['stacktrace']->value, ENT_QUOTES, 'UTF-8', true));?>
</p>
		<?php }?>
	</div>



				<hr>

				<footer>
					<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 DBA METADB</p>
				</footer>

			</div> <!-- /container -->

		

		


	</body>
</html><?php }} ?>