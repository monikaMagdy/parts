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
		if (strlen($phoneNumber) < 11 || strlen($phoneNumber) > 11)
		{
			echo"<script>alert('check $phoneNumber');</script>";
		}
		else if(strlen($RegisterSupplierNumber) !=20)
		{
			echo"<script>alert('check $RegisterSupplierNumber');</script>";
		}
		else if (strlen($CommercialRecord)!=15)
		{
			echo"<script>alert('check $CommercialRecord');</script>";
		}
		else
			$this->model->addcompany($CompanyName, $email, $phoneNumber, $RegisterSupplierNumber, $CommercialRecord);
	}

	public function Con_editCompany($LocalCompanyID)
	{
		$CompanyName			=$_REQUEST['CompanyName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$CompanyName)) 
		{
 			echo "<script>alert('Company Name must be Only letters and white space allowed');
		 		</script>";
		}
		$email					=$_REQUEST['email'];
		/*{
 			echo "<script>alert('Invalid email format, @ is a must');
		 		</script>";
		}*/
		$phoneNumber			=$_REQUEST['phoneNumber'];
		/*if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Phone Number');
		 		</script>";
		}*/
		$RegisterSupplierNumber =$_REQUEST['RegisterSupplierNumber'];
		/*if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Register supplier Number');
		 		</script>";
		}*/
		$CommercialRecord		=$_REQUEST['CommercialRecord'];
		/*if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Commercial Record');
		 		</script>";
		}
		
	    else*/
		$this->model->getCompany($LocalCompanyID)->Model_editCompany($CompanyName,$email,$phoneNumber,$RegisterSupplierNumber,$CommercialRecord);
	}

	public function Con_delete($LocalCompanyID)
	{
		$this->model->getCompany($LocalCompanyID)->deleteCompany();
	}
}
?>