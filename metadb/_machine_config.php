<?php
/**
 * @package DBA METADB
 * Copyright 2013, Twitter, Inc.. All Rights Reserved.
 * @author Jennifer LaGrutta <jen@twitter.com>
 * 
 *
 * MACHINE-SPECIFIC CONFIGURATION SETTINGS
 *
 * The configuration settings in this file can be changed to suit the
 * machine on which the app is running (ex. local, staging or production).
 *
 * This file should not be added to version control, rather a template
 */

require_once 'verysimple/Phreeze/ConnectionSetting.php';
require_once("verysimple/HTTP/RequestUtil.php");

/** database connection settings */
GlobalConfig::$CONNECTION_SETTING = new ConnectionSetting();
GlobalConfig::$CONNECTION_SETTING->ConnectionString = "localhost:3306";
GlobalConfig::$CONNECTION_SETTING->DBName = "metadb";
GlobalConfig::$CONNECTION_SETTING->Username = "app.metadb_adm1";
GlobalConfig::$CONNECTION_SETTING->Password = "XyzorFeNsi8";
GlobalConfig::$CONNECTION_SETTING->Type = "MySQLi";
GlobalConfig::$CONNECTION_SETTING->Charset = "utf8";
GlobalConfig::$CONNECTION_SETTING->Multibyte = true;
// GlobalConfig::$CONNECTION_SETTING->BootstrapSQL = "SET SQL_BIG_SELECTS=1";

/** the root url of the application with trailing slash, for example http://localhost/dba metadb/ */
GlobalConfig::$ROOT_URL = RequestUtil::GetServerRootUrl() . 'metadb/';

/** timezone */
// date_default_timezone_set("UTC");

/** functions for php 5.2 compatibility */
if (!function_exists('lcfirst')) {
	function lcfirst($string) {
		return substr_replace($string, strtolower(substr($string, 0, 1)), 0, 1);
	}
}

// if Multibyte support is specified then we need to check if multibyte functions are available
// if you receive this error then either install multibyte extensions or set Multibyte to false
if (GlobalConfig::$CONNECTION_SETTING->Multibyte && !function_exists('mb_strlen'))
	die('<html>Multibyte extensions are not installed but Multibyte is set to true in _machine_config.php</html>');

/** level 2 cache */
// GlobalConfig::$LEVEL_2_CACHE = new MemCacheProxy(array('localhost'=>'11211'));
GlobalConfig::$LEVEL_2_CACHE_TEMP_PATH = sys_get_temp_dir();
GlobalConfig::$LEVEL_2_CACHE_TIMEOUT = 15;

/** additional machine-specific settings */

?>