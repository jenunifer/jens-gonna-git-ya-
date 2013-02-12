<?php
/** @package    Metadb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * HostCriteria allows custom querying for the Host object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Metadb::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class HostCriteriaDAO extends Criteria
{

	public $Id_Equals;
	public $Id_NotEquals;
	public $Id_IsLike;
	public $Id_IsNotLike;
	public $Id_BeginsWith;
	public $Id_EndWith;
	public $Id_GreaterThan;
	public $Id_GreaterThanOrEqual;
	public $Id_LessThan;
	public $Id_LessThanOrEqual;
	public $Id_In;
	public $Id_IsNotEmpty;
	public $Id_IsEmpty;
	public $Id_BitwiseOr;
	public $Id_BitwiseAnd;
	public $Ipaddr_Equals;
	public $Ipaddr_NotEquals;
	public $Ipaddr_IsLike;
	public $Ipaddr_IsNotLike;
	public $Ipaddr_BeginsWith;
	public $Ipaddr_EndWith;
	public $Ipaddr_GreaterThan;
	public $Ipaddr_GreaterThanOrEqual;
	public $Ipaddr_LessThan;
	public $Ipaddr_LessThanOrEqual;
	public $Ipaddr_In;
	public $Ipaddr_IsNotEmpty;
	public $Ipaddr_IsEmpty;
	public $Ipaddr_BitwiseOr;
	public $Ipaddr_BitwiseAnd;
	public $Fqdn_Equals;
	public $Fqdn_NotEquals;
	public $Fqdn_IsLike;
	public $Fqdn_IsNotLike;
	public $Fqdn_BeginsWith;
	public $Fqdn_EndWith;
	public $Fqdn_GreaterThan;
	public $Fqdn_GreaterThanOrEqual;
	public $Fqdn_LessThan;
	public $Fqdn_LessThanOrEqual;
	public $Fqdn_In;
	public $Fqdn_IsNotEmpty;
	public $Fqdn_IsEmpty;
	public $Fqdn_BitwiseOr;
	public $Fqdn_BitwiseAnd;
	public $MysqlDbCluster_Equals;
	public $MysqlDbCluster_NotEquals;
	public $MysqlDbCluster_IsLike;
	public $MysqlDbCluster_IsNotLike;
	public $MysqlDbCluster_BeginsWith;
	public $MysqlDbCluster_EndWith;
	public $MysqlDbCluster_GreaterThan;
	public $MysqlDbCluster_GreaterThanOrEqual;
	public $MysqlDbCluster_LessThan;
	public $MysqlDbCluster_LessThanOrEqual;
	public $MysqlDbCluster_In;
	public $MysqlDbCluster_IsNotEmpty;
	public $MysqlDbCluster_IsEmpty;
	public $MysqlDbCluster_BitwiseOr;
	public $MysqlDbCluster_BitwiseAnd;
	public $MysqlDbClusterPart_Equals;
	public $MysqlDbClusterPart_NotEquals;
	public $MysqlDbClusterPart_IsLike;
	public $MysqlDbClusterPart_IsNotLike;
	public $MysqlDbClusterPart_BeginsWith;
	public $MysqlDbClusterPart_EndWith;
	public $MysqlDbClusterPart_GreaterThan;
	public $MysqlDbClusterPart_GreaterThanOrEqual;
	public $MysqlDbClusterPart_LessThan;
	public $MysqlDbClusterPart_LessThanOrEqual;
	public $MysqlDbClusterPart_In;
	public $MysqlDbClusterPart_IsNotEmpty;
	public $MysqlDbClusterPart_IsEmpty;
	public $MysqlDbClusterPart_BitwiseOr;
	public $MysqlDbClusterPart_BitwiseAnd;
	public $Platform_Equals;
	public $Platform_NotEquals;
	public $Platform_IsLike;
	public $Platform_IsNotLike;
	public $Platform_BeginsWith;
	public $Platform_EndWith;
	public $Platform_GreaterThan;
	public $Platform_GreaterThanOrEqual;
	public $Platform_LessThan;
	public $Platform_LessThanOrEqual;
	public $Platform_In;
	public $Platform_IsNotEmpty;
	public $Platform_IsEmpty;
	public $Platform_BitwiseOr;
	public $Platform_BitwiseAnd;
	public $UnmonitoredUntil_Equals;
	public $UnmonitoredUntil_NotEquals;
	public $UnmonitoredUntil_IsLike;
	public $UnmonitoredUntil_IsNotLike;
	public $UnmonitoredUntil_BeginsWith;
	public $UnmonitoredUntil_EndWith;
	public $UnmonitoredUntil_GreaterThan;
	public $UnmonitoredUntil_GreaterThanOrEqual;
	public $UnmonitoredUntil_LessThan;
	public $UnmonitoredUntil_LessThanOrEqual;
	public $UnmonitoredUntil_In;
	public $UnmonitoredUntil_IsNotEmpty;
	public $UnmonitoredUntil_IsEmpty;
	public $UnmonitoredUntil_BitwiseOr;
	public $UnmonitoredUntil_BitwiseAnd;
	public $Role_Equals;
	public $Role_NotEquals;
	public $Role_IsLike;
	public $Role_IsNotLike;
	public $Role_BeginsWith;
	public $Role_EndWith;
	public $Role_GreaterThan;
	public $Role_GreaterThanOrEqual;
	public $Role_LessThan;
	public $Role_LessThanOrEqual;
	public $Role_In;
	public $Role_IsNotEmpty;
	public $Role_IsEmpty;
	public $Role_BitwiseOr;
	public $Role_BitwiseAnd;
	public $UpdatedAt_Equals;
	public $UpdatedAt_NotEquals;
	public $UpdatedAt_IsLike;
	public $UpdatedAt_IsNotLike;
	public $UpdatedAt_BeginsWith;
	public $UpdatedAt_EndWith;
	public $UpdatedAt_GreaterThan;
	public $UpdatedAt_GreaterThanOrEqual;
	public $UpdatedAt_LessThan;
	public $UpdatedAt_LessThanOrEqual;
	public $UpdatedAt_In;
	public $UpdatedAt_IsNotEmpty;
	public $UpdatedAt_IsEmpty;
	public $UpdatedAt_BitwiseOr;
	public $UpdatedAt_BitwiseAnd;
	public $NewRole_Equals;
	public $NewRole_NotEquals;
	public $NewRole_IsLike;
	public $NewRole_IsNotLike;
	public $NewRole_BeginsWith;
	public $NewRole_EndWith;
	public $NewRole_GreaterThan;
	public $NewRole_GreaterThanOrEqual;
	public $NewRole_LessThan;
	public $NewRole_LessThanOrEqual;
	public $NewRole_In;
	public $NewRole_IsNotEmpty;
	public $NewRole_IsEmpty;
	public $NewRole_BitwiseOr;
	public $NewRole_BitwiseAnd;
	public $Type_Equals;
	public $Type_NotEquals;
	public $Type_IsLike;
	public $Type_IsNotLike;
	public $Type_BeginsWith;
	public $Type_EndWith;
	public $Type_GreaterThan;
	public $Type_GreaterThanOrEqual;
	public $Type_LessThan;
	public $Type_LessThanOrEqual;
	public $Type_In;
	public $Type_IsNotEmpty;
	public $Type_IsEmpty;
	public $Type_BitwiseOr;
	public $Type_BitwiseAnd;
	public $PuppetBranch_Equals;
	public $PuppetBranch_NotEquals;
	public $PuppetBranch_IsLike;
	public $PuppetBranch_IsNotLike;
	public $PuppetBranch_BeginsWith;
	public $PuppetBranch_EndWith;
	public $PuppetBranch_GreaterThan;
	public $PuppetBranch_GreaterThanOrEqual;
	public $PuppetBranch_LessThan;
	public $PuppetBranch_LessThanOrEqual;
	public $PuppetBranch_In;
	public $PuppetBranch_IsNotEmpty;
	public $PuppetBranch_IsEmpty;
	public $PuppetBranch_BitwiseOr;
	public $PuppetBranch_BitwiseAnd;

}

?>