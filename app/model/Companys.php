<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Company.php");
  include_once("database.php");

?>
<?php

class Companys extends Model 
{
	private $companys;
	function __construct()
	 {
        $d1= Database::GetInstance();
        $d1->GetConnection();
		$this->fillArray();
	}

	function fillArray() {
		$this->companys = array();
		$result = $this->readCompanys();
		while ($row = $result->fetch_assoc()) {
			array_push($this->companys, new Company($row["LocalCompanyID"]));
		}
	}
function getCompanys() {
		$this->fillArray();  
		return $this->companys;
	}

	function getCompany($LocalCompanyID)
	{
		foreach($this->companys as $Company)
		{
			if ($LocalCompanyID == $Company->getLocalCompanyID()) {
				return $Company;
			}
		}
		
	}
function readCompanys()
	{
		$sql = "SELECT * FROM localcompany";

        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
	function addcompany($CompanyName, $email,$phoneNumber,$RegisterSupplierNumber,$CommercialRecord)
	{
		$sql = "INSERT INTO localcompany 
		(
		CompanyName,
		email,
		phoneNumber,
		RegisterSupplierNumber,
		CommercialRecord
		)
		VALUES 
		(
		'$CompanyName',
		'$email',
		'$phoneNumber' ,
		'$RegisterSupplierNumber',
		'$CommercialRecord'
		)";
	 	$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);

		if ($sql){
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}	
}