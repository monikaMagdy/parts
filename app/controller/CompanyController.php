<?php

require_once(__ROOT__ . "controller/Controller.php");

class CompanyController extends Controller
{
	public function Con_addCompany()
	{
		$CompanyName			=$_REQUEST['CompanyName'];
		$email					=$_REQUEST['email'];
		$phoneNumber			=$_REQUEST['phoneNumber'];
		$RegisterSupplierNumber =$_REQUEST['RegisterSupplierNumber'];
		$CommercialRecord		=$_REQUEST['CommercialRecord'];

		//validation
		/*if(empty($_REQUEST['CompanyName']) || empty($_REQUEST['email'])|| empty($_REQUEST['phoneNumber'])||empty($_REQUEST['RegisterSupplierNumber'])||empty($_REQUEST['CommercialRecord']))	
	    {
	    	if (!preg_match("/^['@']*$/",$_REQUEST['email'])
		 echo "<script>alert('Please Fill The empty space');
		 </script>";
	    }
		else*/
		$this->model->addcompany($CompanyName, $email, $phoneNumber, $RegisterSupplierNumber, $CommercialRecord);
	}

	public function Con_editCompany($LocalCompanyID)
	{
		$CompanyName			= $_REQUEST['CompanyName'];
		$email 					= $_REQUEST['email'];
        $phoneNumber	 		= $_REQUEST['phoneNumber'];
		$RegisterSupplierNumber = $_REQUEST['RegisterSupplierNumber'];
		$CommercialRecord 		= $_REQUEST['CommercialRecord'];

		//validation
		/*if(empty($_REQUEST['CompanyName']) || empty($_REQUEST['email'])|| empty($_REQUEST['phoneNumber'])||empty($_REQUEST['RegisterSupplierNumber'])||empty($_REQUEST['CommercialRecord']))	
	    {
		 echo "<script>alert('Please Fill The empty space');
		 </script>";
	    }
	    else*/
		$this->model->getCompany($LocalCompanyID)->Model_editCompany(
		$CompanyName,
		$email,
		$phoneNumber,
		$RegisterSupplierNumber,
		$CommercialRecord
		);
	}

	public function Con_delete($LocalCompanyID)
	{
		$this->model->getCompany($LocalCompanyID)->deleteCompany();
	}
}
?>