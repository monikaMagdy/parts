<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Export.php");
include_once("database.php");

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
			array_push($this->Exports, new Export($row['ExportID'],$row["localCompanyID"],$row["CarID"],$row["PartNumber"],$row["PartName"],$row["Quantity"],$row["itemPrice"],$row["TotalCost"]));
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

	function Model_insertExport($companyID,$CarID,$PartNumber,$PartName, $Quantity, $itemPrice, $TotalCost)
	{
		$sql = "INSERT INTO export 
		(
		localCompanyID,
		CarID,
		PartNumber,
		PartName,
		Quantity,
		itemPrice,
		TotalCost
		)
		VALUES
		(
		 '$companyID',
		 '$CarID',
		 '$PartNumber',
		 '$PartName',
		 '$Quantity',
		  '$itemPrice',
		   '$TotalCost'
		)";
	 	$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($sql){
			echo "Record was successfully added<br>";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}
?>