<?php

require_once(__ROOT__ . "controller/Controller.php");

class CompanyController extends Controller
{
	public function Con_addCompany()
	{
		$CompanyName			=filter_var($_REQUEST['CompanyName'], FILTER_SANITIZE_STRING);
		
		$email					=filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
		
		$phoneNumber			=filter_var($_REQUEST['phoneNumber'],FILTER_VALIDATE_INT );
		
		$RegisterSupplierNumber =filter_var($_REQUEST['RegisterSupplierNumber'],FILTER_VALIDATE_INT );
		
		$CommercialRecord		=filter_var($_REQUEST['CommercialRecord'],FILTER_VALIDATE_INT );
		if (empty( $_REQUEST['CompanyName'])||empty($_REQUEST['email'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['RegisterSupplierNumber'])||empty($_REQUEST['CommercialRecord']))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
		else
			$this->model->addcompany($CompanyName, $email, $phoneNumber, $RegisterSupplierNumber, $CommercialRecord);

	}

	public function Con_editCompany($LocalCompanyID)
	{
		$CompanyName			=filter_var($_REQUEST['CompanyName'], FILTER_SANITIZE_STRING);
		
		$email					=filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
		
		$phoneNumber			=filter_var($_REQUEST['phoneNumber'],FILTER_VALIDATE_INT );
		
		$RegisterSupplierNumber =filter_var($_REQUEST['RegisterSupplierNumber'],FILTER_VALIDATE_INT );
		
		$CommercialRecord		=filter_var($_REQUEST['CommercialRecord'],FILTER_VALIDATE_INT );
		if (empty( $_REQUEST['CompanyName'])||empty($_REQUEST['email'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['RegisterSupplierNumber'])||empty($_REQUEST['CommercialRecord']))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
	    else
		$this->model->getCompany($LocalCompanyID)->Model_editCompany($CompanyName,$email,$phoneNumber,$RegisterSupplierNumber,$CommercialRecord);
	}

	public function Con_delete($LocalCompanyID)
	{
		$this->model->getCompany($LocalCompanyID)->deleteCompany($LocalCompanyID);
	}
}
?>