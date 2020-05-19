<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/SparePart.php");

class SpareParts extends Model 
{
	private $SpareParts;
	
	function __construct($CarID)
	{
		$this->CarID = $CarID;
	}

function fillArray() 
	{
		$this->SpareParts = array();
		$this->db = $this->connect();
		$result = $this->readSpareParts($this->CarID);
		while ($row = $result->fetch_assoc()) 
		{
			array_push($this->SpareParts, new SparePart($row["PartNumber"]));
		}
	}

	function getSpareParts() 
	{
		$this->fillArray();  
		return $this->SpareParts;
	}

	function getSparePart($PartNumber)
	{
		foreach($this->SpareParts as $SparePart)
		{
			if ($PartNumber == $SparePart->getPartNumber()) 
			{
				return $SparePart;
			}
		}
	}

	function readSpareParts($CarID)
	{
		$Parts="SELECT * FROM `sparepart` where CarID=".$CarID;
		
		$result=$this->db->query($Parts);
		if ($result->num_rows > -1){
			return $result;
		}
		else
		{
			return false;
		}
	}

	function addSparePart($PartNumber,$PartName,$carName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID)
	{
		$sql="INSERT INTO `sparepart`
		(
		PartNumber,
		PartName,
		carName,
		partCountry,
		partPrice,
		partQuantity,
		image,
		CarID,
		user_ID
		)
	 	VALUES 
	 	(
	 		'$PartNumber',
	 	'$PartName',
		 '$carName',
	 	'$partCountry',
	 	'$partPrice',
	 	'$partQuantity',
		'$image',
	    '$CarID',
		'".$_SESSION['ID']."'
		 )";
		if($this->db->query($sql) === true)
		{
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . $conn->error ;
		}
	}
	function template($companyID,$CarID,$PartNumber,$PartName, $Quantity, $itemPrice, $TotalCost)
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
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
}
?>