<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Export.php");
require_once(__ROOT__ ."db/database.php");
class Exports extends Model 
{
	private $Exports;
	private $Parts;
	private $TotalPrice;
	private $LocalCompanyID;
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
			array_push($this->Exports, new Export($row['ExportID'],$row['LocalCompanyID'],
			$row['PartNumber'],$row['PartName'],$row['partQuantity'],$row['ItemPrice'],$row['TotalPrice']));
		}
	}

	/*function getTotalPrice()
	{
	  return $this->TotalPrice;
	}*/
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
			// else {
			// 	return false;
			// }
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

	function Model_insertExport()
	{
		$sql1="SELECT companyID,partNumber , PartName, PartPrice, partQuantity
			 FROM `cart`";
		$d1= Database::GetInstance();
		$result1 = mysqli_query($d1->GetConnection(), $sql1);
		$sum=0;
		
            while ($row1 = $result1->fetch_assoc()) {
                $LocalCompanyID=$row1["companyID"];
                $PartNumber=$row1["partNumber"];
                $PartName='"'.$row1["PartName"].'"';
                $partQuantity=$row1["partQuantity"];
                $itemPrice=$row1["PartPrice"];
                $sum+=$row1["PartPrice"]*$row1["partQuantity"];
				$tax=$sum+($sum*0.14);
			
            }
       
	

		$sql = "INSERT INTO `export`  
		(
			LocalCompanyID,
		PartNumber,
		PartName,
		partQuantity,
		itemPrice,
		TotalPrice
		)
		VALUES
		(
		$LocalCompanyID,
		$PartNumber,
		$PartName,
		$partQuantity,
		$itemPrice,
		$tax
		)";
		 $d1= Database::GetInstance();
		$result = mysqli_query($d1->GetConnection(), $sql);
		if ($result){
			echo "<br>Record was successfully added<br>";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}
?>