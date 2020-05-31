<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Export.php");
require_once(__ROOT__ ."db/database.php");
class Exports extends Model 
{
	private $Exports;
	private $Parts;
	function __construct() 
	{
        $d1= Database::GetInstance();
        $d1->GetConnection();
		$this->fillArray();
	}

	function fillArray() 
	{
		$this->Exports = array();
		$result = $this->readExport();
		while ($row = $result->fetch_assoc())
		{
			array_push($this->Exports, new Export($row['ExportID']));
		}
	}


	function getExports() 
	{
		$this->fillArray();  
		return $this->Exports;
	}

	function getExport($id)
	{
		foreach($this->Exports as $export)
		{
			if ($id == $export->getExportID())
			{
				return $export;
			}
		}
	}

	function readExport()
	{
		$sql = "SELECT * FROM export";

        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows > -1){
			return $result;
		}
		else {
			return false;
		}
	}

	function Model_insertExport($companyID,$companyName,$PartNumber,$PartName,$Quantity,$itemPrice,$TotalCost)
	{
		$company="SELECT LocalCompanyID , CompanyName FROM localcompany where LocalCompanyID=$companyID;";
		$d1= Database::GetInstance();
		$result1 = mysqli_query($d1->GetConnection(), $company);
		$row1=mysqli_fetch_array($result1);
		$sql = "INSERT INTO export 
		(
		localCompanyID,
		companyName,
		PartNumber,
		PartName,
		Quantity,
		itemPrice,
		TotalCost
		)
		VALUES
		(
		'$companyID',
		'$companyName',
		'$PartNumber',
		'$PartName',
		'$Quantity',
		'$itemPrice',
		'$TotalCost'
		)";
		 $d1= Database::GetInstance();
		$result = mysqli_query($d1->GetConnection(), $sql);
		if ($sql){
			echo "<br>Record was successfully added<br>";
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}
?>