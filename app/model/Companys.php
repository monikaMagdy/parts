<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Company.php");
?>
<?php

class Companys extends Model 
{
	private $companys;
	function __construct()
	 {
		$this->fillArray();
	}

	function fillArray() {
		$this->companys = array();
		$this->db = $this->connect();
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

		$result = $this->db->query($sql);
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
		if($this->db->query($sql) === true)
		{
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}	
}