<?php
/** @package    Metadb::Reporter 
* Copyright 2013, Twitter, Inc.. All Rights Reserved.
*
* @author Jennifer LaGrutta <jen@twitter.com>
*/
/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is the Reporter based on the Host object.  The reporter object
 * allows you to run arbitrary queries that return data which may (or may not) fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Metadb::Model::DAO
 *
 */
class HostReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `hosts` table
	public $CustomFieldExample;

	public $Id;
	public $Ipaddr;
	public $Fqdn;
	public $MysqlDbCluster;
	public $MysqlDbClusterPart;
	public $Platform;
	public $UnmonitoredUntil;
	public $Role;
	public $UpdatedAt;
	public $NewRole;
	public $Type;
	public $PuppetBranch;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`hosts`.`h_id` as Id
			,`hosts`.`ipaddr` as Ipaddr
			,`hosts`.`h_fqdn` as Fqdn
			,`hosts`.`mysql_db_cluster` as MysqlDbCluster
			,`hosts`.`mysql_db_cluster_part` as MysqlDbClusterPart
			,`hosts`.`platform` as Platform
			,`hosts`.`unmonitored_until` as UnmonitoredUntil
			,`hosts`.`role` as Role
			,`hosts`.`updated_at` as UpdatedAt
			,`hosts`.`new_role` as NewRole
			,`hosts`.`-type` as Type
			,`hosts`.`puppet_branch` as PuppetBranch
		from `hosts`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `hosts`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
}

?>