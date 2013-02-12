<?php
/** @package    DBA METADB::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Host.php");

/**
 * HostController is the controller class for the Host object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DBA METADB::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class HostController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of host objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for host records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new HostCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Ipaddr,Fqdn,MysqlDbCluster,MysqlDbClusterPart,Platform,UnmonitoredUntil,Role,UpdatedAt,NewRole,Type,PuppetBranch'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$hosts = $this->Phreezer->Query('Host',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $hosts->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $hosts->TotalResults;
				$output->totalPages = $hosts->TotalPages;
				$output->pageSize = $hosts->PageSize;
				$output->currentPage = $hosts->CurrentPage;
			}
			else
			{
				// return all results
				$hosts = $this->Phreezer->Query('Host',$criteria);
				$output->rows = $hosts->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single host record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$host = $this->Phreezer->Get('Host',$pk);
			$this->RenderJSON($host, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new host record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$host = new Host($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			//$host->Id = $this->SafeGetVal($json, 'id');

			$host->Ipaddr = $this->SafeGetVal($json, 'ipaddr');
			$host->Fqdn = $this->SafeGetVal($json, 'fqdn');
			$host->MysqlDbCluster = $this->SafeGetVal($json, 'mysqlDbCluster');
			$host->MysqlDbClusterPart = $this->SafeGetVal($json, 'mysqlDbClusterPart');
			$host->Platform = $this->SafeGetVal($json, 'platform');
			$host->UnmonitoredUntil = $this->SafeGetVal($json, 'unmonitoredUntil');
			$host->Role = $this->SafeGetVal($json, 'role');
			$host->UpdatedAt = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'updatedAt')));
			$host->NewRole = $this->SafeGetVal($json, 'newRole');
			$host->Type = $this->SafeGetVal($json, 'type');
			$host->PuppetBranch = $this->SafeGetVal($json, 'puppetBranch');

			$host->Validate();
			$errors = $host->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$host->Save();
				$this->RenderJSON($host, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing host record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$host = $this->Phreezer->Get('Host',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $host->Id = $this->SafeGetVal($json, 'id', $host->Id);

			$host->Ipaddr = $this->SafeGetVal($json, 'ipaddr', $host->Ipaddr);
			$host->Fqdn = $this->SafeGetVal($json, 'fqdn', $host->Fqdn);
			$host->MysqlDbCluster = $this->SafeGetVal($json, 'mysqlDbCluster', $host->MysqlDbCluster);
			$host->MysqlDbClusterPart = $this->SafeGetVal($json, 'mysqlDbClusterPart', $host->MysqlDbClusterPart);
			$host->Platform = $this->SafeGetVal($json, 'platform', $host->Platform);
			$host->UnmonitoredUntil = $this->SafeGetVal($json, 'unmonitoredUntil', $host->UnmonitoredUntil);
			$host->Role = $this->SafeGetVal($json, 'role', $host->Role);
			$host->UpdatedAt = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'updatedAt', $host->UpdatedAt)));
			$host->NewRole = $this->SafeGetVal($json, 'newRole', $host->NewRole);
			$host->Type = $this->SafeGetVal($json, 'type', $host->Type);
			$host->PuppetBranch = $this->SafeGetVal($json, 'puppetBranch', $host->PuppetBranch);

			$host->Validate();
			$errors = $host->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$host->Save();
				$this->RenderJSON($host, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing host record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$host = $this->Phreezer->Get('Host',$pk);

			$host->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
