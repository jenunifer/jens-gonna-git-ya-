<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * ServerMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ServerDAO to the servers datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Metadb::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ServerMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Server object
	 *
	 * @access public
	 * @return array of FieldMaps
	 */
	public static function GetFieldMaps()
	{
		static $fm = null;
		if ($fm == null)
		{
			$fm = Array();
			$fm["Ipaddr"] = new FieldMap("Ipaddr","servers","ipaddr",true,FM_TYPE_INT,10,null,false);
			$fm["MysqlDbCluster"] = new FieldMap("MysqlDbCluster","servers","mysql_db_cluster",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["MysqlDbClusterPart"] = new FieldMap("MysqlDbClusterPart","servers","mysql_db_cluster_part",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["Platform"] = new FieldMap("Platform","servers","platform",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["UnmonitoredUntil"] = new FieldMap("UnmonitoredUntil","servers","unmonitored_until",false,FM_TYPE_BIGINT,20,null,false);
			$fm["Role"] = new FieldMap("Role","servers","role",false,FM_TYPE_VARCHAR,50,null,false);
			$fm["UpdatedAt"] = new FieldMap("UpdatedAt","servers","updated_at",false,FM_TYPE_TIMESTAMP,null,"CURRENT_TIMESTAMP",false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Server object
	 *
	 * @access public
	 * @return array of KeyMaps
	 */
	public static function GetKeyMaps()
	{
		static $km = null;
		if ($km == null)
		{
			$km = Array();
		}
		return $km;
	}

}

?>