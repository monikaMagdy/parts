<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ ."db/database.php");
class Company extends Model
{
	private $LocalCompanyID;
	private $CompanyName;
	private $email;
	private $phoneNumber;
	private $RegisterSupplierNumber;
	private $CommercialRecord;

	function __construct($LocalCompanyID, $CompanyName="",$email="",$phoneNumber="",$RegisterSupplierNumber="",$CommercialRecord="")
	{
		$this->LocalCompanyID = $LocalCompanyID;
        $d1= Database::GetInstance();
        $d1->GetConnection();
		if(""===$CompanyName)
		{
			$this->readCompany($LocalCompanyID);
		}
		else
		{
			$this->CompanyName = $CompanyName;
			$this->email = $email;
			$this->phoneNumber=$phoneNumber;
			$this->RegisterSupplierNumber = $RegisterSupplierNumber;
			$this->CommercialRecord = $CommercialRecord;
		}
	}


	function getLocalCompanyID() 
	{
		return $this->LocalCompanyID;
	}	

	function getCompanyName() 
	{
		return $this->CompanyName;
	}	
	function setCompanyName($CompanyName)
	{
		return $this->CompanyName = $CompanyName;
	}

	function getemail() 
	{
		return $this->email;
	}
	function setemail($email) 
	{
		return $this->email = $email;
	}

	function getphoneNumber() 
	{
		return $this->phoneNumber;
	}
	function setphoneNumber($phoneNumber) 
	{
		return $this->phoneNumber = $phoneNumber;
	}

	function getRegisterSupplierNumber() 
	{
		return $this->RegisterSupplierNumber;
	}
	function setRegisterSupplierNumber($RegisterSupplierNumber) 
	{
		return $this->RegisterSupplierNumber = $RegisterSupplierNumber;
	}

	function getCommercialRecord() 
	{
		return $this->CommercialRecord;
	}

	function readCompany($LocalCompanyID)
	{
		$sql = "SELECT * FROM localcompany where LocalCompanyID=".$LocalCompanyID;
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows == 1){
			$row=mysqli_fetch_array($result);

			$this->CompanyName =$row["CompanyName"];
			$this->email =$row["email"];
			$this->phoneNumber=$row["phoneNumber"];
			$this->RegisterSupplierNumber = $row["RegisterSupplierNumber"];
			$this->CommercialRecord = $row["CommercialRecord"];
		}
		else 
		{
			$this->CompanyName = "";
			$this->email = "";
			$this->phoneNumbe= "";
			$this->RegisterSupplierNumber = "";
			$this->CommercialRecord = "";
		}	
	}

	function Model_editCompany($CompanyName, $email,$phoneNumber,$RegisterSupplierNumber,$CommercialRecord)
	{
		$sql = "UPDATE `localcompany` set 
		`CompanyName`='$CompanyName',
		`email`='$email', 
		`phoneNumber`='$phoneNumber' ,
		`RegisterSupplierNumber`='$RegisterSupplierNumber', 
		`CommercialRecord`='$CommercialRecord' 
		where 
		LocalCompanyID=$this->LocalCompanyID;";
		$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);

		if($sql){
			echo "updated successfully.";
			$this->readCompany($this->LocalCompanyID);
		} else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}

	function deleteCompany($LocalCompanyID)
	{
		$sql="DELETE FROM localcompany where LocalCompanyID=$this->LocalCompanyID;";
		$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);

		if($sql){
			echo "deleted successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}