<?php
/** @package    PhreezeM2m::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * BookAuthorAssignMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the BookAuthorAssignDAO to the host_note_assign datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package PhreezeM2m::Model::DAO
 * @note ClassBuilder
 * @version 1.0
 */
class BookAuthorAssignMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the BookAuthorAssign object
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
			$fm["Id"] = new FieldMap("Id","host_note_assign","hna_id",true,FM_TYPE_INT,11,null,true);
			$fm["HostId"] = new FieldMap("HostId","host_note_assign","hna_host_id",false,FM_TYPE_INT,11,null,false);
			$fm["NoteId"] = new FieldMap("AuthorId","host_note_assign","hna_note_id",false,FM_TYPE_INT,11,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the BookAuthorAssign object
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
			$km["hna_host"] = new KeyMap("hna_host", "HostId", "Host", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			$km["hna_note"] = new KeyMap("hna_note", "NoteId", "Note", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return $km;
	}

}

?>