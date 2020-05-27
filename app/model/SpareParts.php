<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/SparePart.php");
//include_once("database.php");

class SpareParts extends Model 
{
	private $SpareParts;
	private $CarID;

	function __construct($CarID)
	{
        $this->CarID = $CarID;
        $d1= Database::GetInstance();
        $d1->GetConnection();
		$this->fillArray();
	}

function fillArray() 
	{
		$this->SpareParts = array();
		//die($readSpareParts);
		//$result = (isset($readSpareParts->CarID) ? $this->CarID : false);


		$result = $this->readSpareParts($this->CarID);
		while ($row = $result->fetch_assoc()) 
		//while($row=mysqli_fetch_assoc($result))
		{
			array_push($this->SpareParts, new SparePart($row["PartNumber"]));
		}
	}

	function getSpareParts() 
	{

        $d1= Database::GetInstance();
        $d1->GetConnection();
		$this->fillArray();  
		return $this->SpareParts;
	}

	function getSparePart($PartNumber)
	{

        $d1= Database::GetInstance();
        $d1->GetConnection();
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
		$Parts="SELECT * FROM `sparepart` where `CarID`='$CarID'";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $Parts);
        //die(print_r($result));
       // if($Parts)
		if ($result->num_rows > -1)
		{
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
	 	$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($sql){
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
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
?>