<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * HostMysqlAttributeMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HostMysqlAttributeDAO to the host_mysql_attributes datastore.
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
class HostMysqlAttributeMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the HostMysqlAttribute object
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
			$fm["HostId"] = new FieldMap("HostId","host_mysql_attributes","host_id",true,FM_TYPE_INT,10,null,false);
			$fm["MysqlAttributeId"] = new FieldMap("MysqlAttributeId","host_mysql_attributes","mysql_attribute_id",true,FM_TYPE_TINYINT,3,null,false);
			$fm["Value"] = new FieldMap("Value","host_mysql_attributes","value",false,FM_TYPE_VARCHAR,255,null,false);
			$fm["UpdatedAt"] = new FieldMap("UpdatedAt","host_mysql_attributes","updated_at",false,FM_TYPE_TIMESTAMP,null,"CURRENT_TIMESTAMP",false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the HostMysqlAttribute object
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