<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * HostMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HostDAO to the hosts datastore.
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
class HostMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Host object
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
			$fm["Id"] = new FieldMap("Id","hosts","id",true,FM_TYPE_INT,10,null,true);
			$fm["Ipaddr"] = new FieldMap("Ipaddr","hosts","ipaddr",false,FM_TYPE_INT,10,null,false);
			$fm["Fqdn"] = new FieldMap("Fqdn","hosts","fqdn",false,FM_TYPE_VARCHAR,50,null,false);
			$fm["MysqlDbCluster"] = new FieldMap("MysqlDbCluster","hosts","mysql_db_cluster",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["MysqlDbClusterPart"] = new FieldMap("MysqlDbClusterPart","hosts","mysql_db_cluster_part",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["Platform"] = new FieldMap("Platform","hosts","platform",false,FM_TYPE_VARCHAR,25,null,false);
			$fm["UnmonitoredUntil"] = new FieldMap("UnmonitoredUntil","hosts","unmonitored_until",false,FM_TYPE_BIGINT,20,null,false);
			$fm["Role"] = new FieldMap("Role","hosts","role",false,FM_TYPE_VARCHAR,50,null,false);
			$fm["UpdatedAt"] = new FieldMap("UpdatedAt","hosts","updated_at",false,FM_TYPE_TIMESTAMP,null,"CURRENT_TIMESTAMP",false);
			$fm["NewRole"] = new FieldMap("NewRole","hosts","new_role",false,FM_TYPE_VARCHAR,64,null,false);
			$fm["Type"] = new FieldMap("Type","hosts","type",false,FM_TYPE_ENUM,array("server","vip","cname"),"server",false);
			$fm["PuppetBranch"] = new FieldMap("PuppetBranch","hosts","puppet_branch",false,FM_TYPE_VARCHAR,10,"production",false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Host object
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