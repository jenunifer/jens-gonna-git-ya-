<?php /* Smarty version Smarty-3.1.7, created on 2013-02-11 21:43:50
         compiled from "/Library/WebServer/Documents/metadb/templates/DefaultHome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20098844925116f5f63dad37-21903739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27b790ce9d3d320f7901956469ef90cb62ed9da8' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/DefaultHome.tpl',
      1 => 1360460724,
      2 => 'file',
    ),
    'bb575e0d1791b4041ac6b247254e8260b86eaad0' => 
    array (
      0 => '/Library/WebServer/Documents/metadb/templates/Master.tpl',
      1 => 1360609189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20098844925116f5f63dad37-21903739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5116f5f648ee8',
  'variables' => 
  array (
    'ROOT_URL' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5116f5f648ee8')) {function content_5116f5f648ee8($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>DBA METADB | Home</title>
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
	

		
<div class="modal hide fade" id="getStartedDialog">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>


	</div>
	<div class="modal-footer">
		
	</div>
</div>

<div class="container">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h3> DBA Metadb Site! <i class="icon-twitter-sign"></i></h3>
		<p>Up-to-date host and database information, DBA communication and links to other valuable DBA resources! This page will have outage, moratorium and lag notifications, shortly.</p>
		<p><a class="btn btn-primary btn-large" data-toggle="modal" href="#getStartedDialog">Dashboard coming soon! &raquo;</a></p>
	</div>
	<div class="row">
		<div class="span3">
			<h2><i class="icon-twitter-sign"></i> DBA Wiki Pages </h2>
			 <p>Can't find what you are looking for here?  Check out our team wiki pages!</p>
			<p><a class="btn" href="http://confluence.local.twitter.com/login.action?os_destination=%2Fdisplay%2FDBA%2FHome">go/DBA</a></p>
		</div>
		<div class="span3">
			<h2><i class="icon-th"></i> DBA Dashboard </h2>
			 <p> Viz charts to managed databases. </p>
			<p><a class="btn" href="http://dba-dashboard.twitter.biz/?aspect=Overview&cluster=adbil&datacenter=smf1&time_granularity=auto&time_span=hour-2&timezone=local">DBA Dashboard</a></p>
	 	</div>
		<div class="span3">
			<h2><i class="icon-twitter-sign"></i> Who's oncall </h2>
			<p> Manage oncall rotation and see who is coming up! </p>
			<p><a class="btn" href="https://tools.local.twitter.com/oncall">go/oncall</a></p>
		</div>
		<div class="span3">
			<h2><i class="icon-signin"></i> QUICK LINKS </h2>
			<p>The following are quick links to DBA resources:
		<p><a class="btn" href="http://nagios-dba.smf1.twitter.com/nagios/"> smf1-Nagios </a>
		<a class="btn" href="http://nagios-dba.atla.twitter.com/nagios/"> atla-Nagios </a></p>
		<p><a class="btn" href="https://docs.google.com/a/twitter.com/spreadsheet/ccc?key=0Ag1MUEnSKJKSdDVIcmprek1fWDljVkROVEFRTFlSSkE#gid=0"> Backup Schedule </a></p>
		<p><a class="btn" href="http://dashboard.smf1.twitter.com/"> Twitter.com dashboard </a></p>
			</p>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 METADB</p>
	</footer>

</div> <!-- /container -->



		
		

	</body>
</html><?php }} ?>