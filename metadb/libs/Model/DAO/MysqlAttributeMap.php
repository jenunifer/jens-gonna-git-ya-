<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * MysqlAttributeMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MysqlAttributeDAO to the mysql_attributes datastore.
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
class MysqlAttributeMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the MysqlAttribute object
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
			$fm["Id"] = new FieldMap("Id","mysql_attributes","id",true,FM_TYPE_TINYINT,3,null,true);
			$fm["Name"] = new FieldMap("Name","mysql_attributes","name",false,FM_TYPE_VARCHAR,255,null,false);
			$fm["DefaultValue"] = new FieldMap("DefaultValue","mysql_attributes","default_value",false,FM_TYPE_VARCHAR,255,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the MysqlAttribute object
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