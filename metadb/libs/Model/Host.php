<?php
/** @package    Metadb::Model 
** Copyright 2013, Twitter, Inc.. All Rights Reserved.
*
* @author Jennifer LaGrutta <jen@twitter.com>
/** @package    DBA METADB::Controller */

/** import supporting libraries */
require_once("DAO/HostDAO.php");
require_once("HostCriteria.php");

/**
 * The Host class extends HostDAO which provides the access
 * to the datastore.
 *
 * @package Metadb::Model
 */
class Host extends HostDAO
{

	/**
	 * Override default validation
	 * @see Phreezable::Validate()
	 */
	public function Validate()
	{
		// example of custom validation
		// $this->ResetValidationErrors();
		// $errors = $this->GetValidationErrors();
		// if ($error == true) $this->AddValidationError('FieldName', 'Error Information');
		// return !$this->HasValidationErrors();

		return parent::Validate();
	}

	/**
	 * @see Phreezable::OnSave()
	 */
	public function OnSave($insert)
	{
		// the controller create/update methods validate before saving.  this will be a
		// redundant validation check, however it will ensure data integrity at the model
		// level based on validation rules.  comment this line out if this is not desired
		if (!$this->Validate()) throw new Exception('Unable to Save Host: ' .  implode(', ', $this->GetValidationErrors()));

		// OnSave must return true or eles Phreeze will cancel the save operation
		return true;
	}

}

?>