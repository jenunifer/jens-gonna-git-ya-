<?php
/**
 * @package DBA METADB
 * Copyright 2013, Twitter, Inc.. All Rights Reserved.
 *
 * @author Jennifer LaGrutta <jen@twitter.com>
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * Don't ADD TO or EDIT this File!  This is necessary for the app to run smoothly and needs to be moved to any server this app is running on
 * (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
GlobalConfig::$APP_ROOT = realpath("./");

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/libs/phreeze/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * Smarty PHP
 * IRenderEngine for the view layer.  
 * 
 */
require_once 'verysimple/Phreeze/SmartyRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SmartyRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';
GlobalConfig::$TEMPLATE_CACHE_PATH = GlobalConfig::$APP_ROOT . '/templates_c/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),

	// Oauth/LDAP routes (coming soon)
	'GET:loginform' => array('route' => 'Secure.LoginForm'),
	'POST:login' => array('route' => 'Secure.Login'),
	'GET:secureuser' => array('route' => 'Secure.UserPage'),
	'GET:secureadmin' => array('route' => 'Secure.AdminPage'),
	'GET:logout' => array('route' => 'Secure.Logout'),
		
	// CnameServer
	'GET:cnameservers' => array('route' => 'CnameServer.ListView'),
	'GET:cnameserver/(:any)' => array('route' => 'CnameServer.SingleView', 'params' => array('cnameId' => 1)),
	'GET:api/cnameservers' => array('route' => 'CnameServer.Query'),
	'POST:api/cnameserver' => array('route' => 'CnameServer.Create'),
	'GET:api/cnameserver/(:any)' => array('route' => 'CnameServer.Read', 'params' => array('cnameId' => 2)),
	'PUT:api/cnameserver/(:any)' => array('route' => 'CnameServer.Update', 'params' => array('cnameId' => 2)),
	'DELETE:api/cnameserver/(:any)' => array('route' => 'CnameServer.Delete', 'params' => array('cnameId' => 2)),
		
	// Cname
	'GET:cnames' => array('route' => 'Cname.ListView'),
	'GET:cname/(:num)' => array('route' => 'Cname.SingleView', 'params' => array('id' => 1)),
	'GET:api/cnames' => array('route' => 'Cname.Query'),
	'POST:api/cname' => array('route' => 'Cname.Create'),
	'GET:api/cname/(:num)' => array('route' => 'Cname.Read', 'params' => array('id' => 2)),
	'PUT:api/cname/(:num)' => array('route' => 'Cname.Update', 'params' => array('id' => 2)),
	'DELETE:api/cname/(:num)' => array('route' => 'Cname.Delete', 'params' => array('id' => 2)),
		
	// // Facts
	// 'GET:factses' => array('route' => 'Facts.ListView'),
	// 'GET:facts/(:num)' => array('route' => 'Facts.SingleView', 'params' => array('id' => 1)),
	// 'GET:api/factses' => array('route' => 'Facts.Query'),
	// 'POST:api/facts' => array('route' => 'Facts.Create'),
	// 'GET:api/facts/(:num)' => array('route' => 'Facts.Read', 'params' => array('id' => 2)),
	// 'PUT:api/facts/(:num)' => array('route' => 'Facts.Update', 'params' => array('id' => 2)),
	// 'DELETE:api/facts/(:num)' => array('route' => 'Facts.Delete', 'params' => array('id' => 2)),
	// 	
	// // HostFacts
	// 'GET:hostfactses' => array('route' => 'HostFacts.ListView'),
	// 'GET:hostfacts/(:any)' => array('route' => 'HostFacts.SingleView', 'params' => array('hostId' => 1)),
	// 'GET:api/hostfactses' => array('route' => 'HostFacts.Query'),
	// 'POST:api/hostfacts' => array('route' => 'HostFacts.Create'),
	// 'GET:api/hostfacts/(:any)' => array('route' => 'HostFacts.Read', 'params' => array('hostId' => 2)),
	// 'PUT:api/hostfacts/(:any)' => array('route' => 'HostFacts.Update', 'params' => array('hostId' => 2)),
	// 'DELETE:api/hostfacts/(:any)' => array('route' => 'HostFacts.Delete', 'params' => array('hostId' => 2)),
		
	// HostMysqlAttribute
	'GET:hostmysqlattributes' => array('route' => 'HostMysqlAttribute.ListView'),
	'GET:hostmysqlattribute/(:any)' => array('route' => 'HostMysqlAttribute.SingleView', 'params' => array('hostId' => 1)),
	'GET:api/hostmysqlattributes' => array('route' => 'HostMysqlAttribute.Query'),
	'POST:api/hostmysqlattribute' => array('route' => 'HostMysqlAttribute.Create'),
	'GET:api/hostmysqlattribute/(:any)' => array('route' => 'HostMysqlAttribute.Read', 'params' => array('hostId' => 2)),
	'PUT:api/hostmysqlattribute/(:any)' => array('route' => 'HostMysqlAttribute.Update', 'params' => array('hostId' => 2)),
	'DELETE:api/hostmysqlattribute/(:any)' => array('route' => 'HostMysqlAttribute.Delete', 'params' => array('hostId' => 2)),
		
	// HostNote
	'GET:hostnotes' => array('route' => 'HostNote.ListView'),
	'GET:hostnote/(:any)' => array('route' => 'HostNote.SingleView', 'params' => array('hostId' => 1)),
	'GET:api/hostnotes' => array('route' => 'HostNote.Query'),
	'POST:api/hostnote' => array('route' => 'HostNote.Create'),
	'GET:api/hostnote/(:any)' => array('route' => 'HostNote.Read', 'params' => array('hostId' => 2)),
	'PUT:api/hostnote/(:any)' => array('route' => 'HostNote.Update', 'params' => array('hostId' => 2)),
	'DELETE:api/hostnote/(:any)' => array('route' => 'HostNote.Delete', 'params' => array('hostId' => 2)),
		
	// Host
	'GET:hosts' => array('route' => 'Host.ListView'),
	'GET:host/(:num)' => array('route' => 'Host.SingleView', 'params' => array('id' => 1)),
	'GET:api/hosts' => array('route' => 'Host.Query'),
	'POST:api/host' => array('route' => 'Host.Create'),
	'GET:api/host/(:num)' => array('route' => 'Host.Read', 'params' => array('id' => 2)),
	'PUT:api/host/(:num)' => array('route' => 'Host.Update', 'params' => array('id' => 2)),
	'DELETE:api/host/(:num)' => array('route' => 'Host.Delete', 'params' => array('id' => 2)),
		
	// MysqlAttribute
	'GET:mysqlattributes' => array('route' => 'MysqlAttribute.ListView'),
	'GET:mysqlattribute/(:num)' => array('route' => 'MysqlAttribute.SingleView', 'params' => array('id' => 1)),
	'GET:api/mysqlattributes' => array('route' => 'MysqlAttribute.Query'),
	'POST:api/mysqlattribute' => array('route' => 'MysqlAttribute.Create'),
	'GET:api/mysqlattribute/(:num)' => array('route' => 'MysqlAttribute.Read', 'params' => array('id' => 2)),
	'PUT:api/mysqlattribute/(:num)' => array('route' => 'MysqlAttribute.Update', 'params' => array('id' => 2)),
	'DELETE:api/mysqlattribute/(:num)' => array('route' => 'MysqlAttribute.Delete', 'params' => array('id' => 2)),
		
	// Server
	'GET:servers' => array('route' => 'Server.ListView'),
	'GET:server/(:any)' => array('route' => 'Server.SingleView', 'params' => array('ipaddr' => 1)),
	'GET:api/servers' => array('route' => 'Server.Query'),
	'POST:api/server' => array('route' => 'Server.Create'),
	'GET:api/server/(:any)' => array('route' => 'Server.Read', 'params' => array('ipaddr' => 2)),
	'PUT:api/server/(:any)' => array('route' => 'Server.Update', 'params' => array('ipaddr' => 2)),
	'DELETE:api/server/(:any)' => array('route' => 'Server.Delete', 'params' => array('ipaddr' => 2)),
		
	// VipServer
	'GET:vipservers' => array('route' => 'VipServer.ListView'),
	'GET:vipserver/(:any)' => array('route' => 'VipServer.SingleView', 'params' => array('vipId' => 1)),
	'GET:api/vipservers' => array('route' => 'VipServer.Query'),
	'POST:api/vipserver' => array('route' => 'VipServer.Create'),
	'GET:api/vipserver/(:any)' => array('route' => 'VipServer.Read', 'params' => array('vipId' => 2)),
	'PUT:api/vipserver/(:any)' => array('route' => 'VipServer.Update', 'params' => array('vipId' => 2)),
	'DELETE:api/vipserver/(:any)' => array('route' => 'VipServer.Delete', 'params' => array('vipId' => 2)),
		
	// Viphost
	'GET:viphosts' => array('route' => 'Viphost.ListView'),
	'GET:viphost/(:any)' => array('route' => 'Viphost.SingleView', 'params' => array('ipaddr' => 1)),
	'GET:api/viphosts' => array('route' => 'Viphost.Query'),
	'POST:api/viphost' => array('route' => 'Viphost.Create'),
	'GET:api/viphost/(:any)' => array('route' => 'Viphost.Read', 'params' => array('ipaddr' => 2)),
	'PUT:api/viphost/(:any)' => array('route' => 'Viphost.Update', 'params' => array('ipaddr' => 2)),
	'DELETE:api/viphost/(:any)' => array('route' => 'Viphost.Delete', 'params' => array('ipaddr' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>