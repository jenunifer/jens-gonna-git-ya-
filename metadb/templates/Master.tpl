<!DOCTYPE html>
<html lang="en">
	<head>
	{block name=header}
		<meta charset="utf-8">
		<base href="{$ROOT_URL}" />
		<title>{block name=title}DBA METADB{/block}</title>
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

	{/block}

	{block name=customHeader}
	{/block}

	</head>

	<body>

		{block name=navbar}

			{if !isset($nav)}{assign var="nav" value="home"}{/if}

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<img src="images/twbird.png"</img>
							<a class="brand"><href="./">DBA METADB Site</a>
							<ul class="nav">
								<li {if $nav=='hosts'} class="active"{/if}><a href="./hosts">Hosts</a></li>
								<li {if $nav=='hostnotes'} class="active"{/if}><a href="./hostnotes">Notes</a></li>
								<li {if $nav=='cnames'} class="active"{/if}><a href="http://confluence.local.twitter.com/display/DBA/Home">DBA Wiki</a></li>
								<li {if $nav=='cnameservers'} class="active"{/if}><a href="http://dba-dashboard.twitter.biz">DBA Dashboard</a></li>
							</ul>
						<ul class="nav">
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li {if $nav=='mysqlattributes'} class="active"{/if}><a href="./mysqlattributes">Attribute List</a></li>
								<li {if $nav=='servers'} class="active"{/if}><a href="./servers">Servers</a></li>
								<!-- ><li {if $nav=='vipservers'} class="active"{/if}><a href="./vipservers">VipServers</a></li>-->
								<li {if $nav=='viphosts'} class="active"{/if}><a href="./viphosts">VIP Hosts</a></li>
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
	{/block}

		{block name=container}
			<div class="container">

				{block name="banner"}
					<h4>DBA METADB</h4>
				{/block}

				{block name="content"}
				{/block}

				<hr>

				<footer>
					<p>&copy; {$smarty.now|date_format:'%Y'} DBA METADB</p>
				</footer>

			</div> <!-- /container -->

		{/block}

		{block name=customFooterScripts}
		{/block}

	</body>
</html>