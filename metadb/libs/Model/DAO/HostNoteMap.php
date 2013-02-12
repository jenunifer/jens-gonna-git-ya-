<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * HostNoteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HostNoteDAO to the host_notes datastore.
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
class HostNoteMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the HostNote object
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
			$fm["HostId"] = new FieldMap("HostId","host_notes","host_id",true,FM_TYPE_INT,10,null,false);
			$fm["CreatedAt"] = new FieldMap("CreatedAt","host_notes","created_at",true,FM_TYPE_TIMESTAMP,null,"CURRENT_TIMESTAMP",false);
			$fm["CreatedBy"] = new FieldMap("CreatedBy","host_notes","created_by",false,FM_TYPE_VARCHAR,40,null,false);
			$fm["Notes"] = new FieldMap("Notes","host_notes","notes",false,FM_TYPE_TEXT,null,null,false);
			$fm["RemovedFlag"] = new FieldMap("RemovedFlag","host_notes","removed_flag",false,FM_TYPE_TINYINT,1,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the HostNote object
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