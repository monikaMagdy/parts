<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Export.php");

class Exports extends Model 
{
	private $Exports;
	private $Parts;
	function __construct() 
	{
		$this->fillArray();
	}

	function fillArray() 
	{
		$this->Exports = array();
		$this->db = $this->connect();
		$result = $this->readExport();
		while ($row = $result->fetch_assoc())
		{
			array_push($this->Exports, new Export($row['ExportID'],$row["companyID"],$row["CarID"],$row["PartNumber"],$row["PartName"],$row["Quantity"],$row["itemPrice"],$row["TotalCost"]));
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

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
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
		if($this->db->query($sql) === true)
		{
			echo "Record was successfully added<br>";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
}
?>