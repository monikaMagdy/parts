<?php
require_once(__ROOT__ . "model/Model.php");
include_once("database.php");

class SparePart extends Model
{
	private $PartNumber;
	private $PartName;
	private $partCountry;
	private $carName;
	private $partPrice;
	private $partQuantity;
	private $image;
	private $CarID;
	private $user_ID;
	
	function __construct($PartNumber,$PartName="",$partCountry="",$carName="",$partPrice="",$partQuantity="",$image="",$CarID="",$user_ID="")
	{
		$this->PartNumber = $PartNumber;
        $d1= Database::GetInstance();
        $d1->GetConnection();
    	if (""===$PartName) 
	    {
	        $this->readSparePart($PartNumber);
	    } 
	    else 
	    {
	        $this->PartName = $PartName;
	        $this->partCountry = $partCountry;
	        $this->carName = $carName;
	        $this->partPrice = $partPrice;
	        $this->partQuantity = $partQuantity;
	        $this->image = $image;
			$this->CarID=$CarID;
			$this->user_ID=$user_ID;
	    }
	}

	function getPartNumber() 
	{
		return $this->PartNumber;
	}	
	function setPartNumber($PartNumber)
	{
		return $this->PartNumber = $PartNumber;
	}

	function getPartName() 
	{
		return $this->PartName;
	}
	function setPartName($PartName) 
	{
		return $this->PartName = $PartName;
	}

	function getpartCountry() 
	{
		return $this->partCountry;
	}
	function setpartCountry($partCountry) 
	{
		return $this->partCountry = $partCountry;
	}
	function getcarName() 
	{
		return $this->carName;
	}	
	function setcarName($carName)
	{
		return $this->carName = $carName;
	}
	
	function getpartPrice() 
	{
		return $this->partPrice;
	}
	function setpartPrice($partPrice) 
	{
		return $this->partPrice = $partPrice;
	}

	function getpartQuantity() 
	{
		return $this->partQuantity;
	}
	function setpartQuantity($partQuantity) 
	{
		return $this->partQuantity = $partQuantity;
	}
	function getimage() 
	{
		return $this->image;
	}	
	function setimage($image)
	{
		return $this->image = $image;
	}
	function getCarID()
	{
		return $this->CarID;
	}

	function setCarID($CarID)
	{
		return $this->CarID=$CarID;
	}
	function setuser_ID($user_ID)
	{
		return $this->user_ID=$user_ID;
	}
	function getuser_ID()
	{
		return $this->user_ID;
	}

	function readSparePart($PartNumber)
	{
		$sql = "SELECT * FROM `sparepart` WHERE PartNumber=".$PartNumber;
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows == 1){
			$row=mysqli_fetch_array($result);

			$this->PartName = $row['PartName'];
			$this->partCountry = $row['partCountry'];
			$this->carName=$row['carName'];
			$this->partPrice = $row['partPrice'];
			$this->partQuantity = $row['partQuantity'];
			$this->image = $row['image'];
			$this->CarID=$row['CarID'];
			$this->user_ID=$row['user_ID'];
		}
		else 
		{

			$this->PartName = "";
			$this->partCountry ="";
			$this->carName = "";
			$this->partPrice = "";
			$this->partQuantity = "";
			$this->image = "";
			$this->CarID = "";
			$this->user_ID = "";

		}	
	}

	function Model_editSparePart($PartNumber,$PartName,$partCountry,$carName,$partPrice,$partQuantity)
	{
		$edit = "UPDATE `sparepart` SET PartName='$PartName',partCountry='$partCountry',carName='$carName',partPrice='$partPrice',partQuantity='$partQuantity' where 
	PartNumber=	'$PartNumber'" ;

if($this->db->query($edit) === true)
{
	echo "updated successfully.";
	$this->readSparePart($this->PartNumber);
} 
else
{
	echo "ERROR: Could not able to execute $edit. " . $conn->error;
}
	 
	}

	function deleteSparePart($PartNumber)
	{
		$sql="DELETE FROM sparepart WHERE PartNumber=$this->PartNumber";
		
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if($sql){
			echo"Deleted the spare parts of this car successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
	
	function getSparePart($PartNumber)
	{
		return $this;
	}

	function Model_decreseQty( $PartNumber, $partQuantity)
	{
		
	$edit = "UPDATE `sparepart` SET partQuantity=$this->partQuantity - $partQuantity' where  PartNumber=$this->PartNumber";
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $edit);
		
		if($edit)
		{
			echo "updated successfully.";
			$this->readCar($this->CarID);
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
	function Model_IncQty( $PartNumber,$partQuantity)
	{
		
	$inc = "UPDATE `sparepart` SET partQuantity=$this->partQuantity + $partQuantity' where  PartNumber=$this->PartNumber";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $inc);
		if($inc){
			echo "updated successfully.";
			$this->readCar($this->CarID);
		} 
		else
		{
			echo "ERROR: Could not able to execute $inc. " ;
		}
	}

	
	function addSparePart($PartNumber,$PartName,$carName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID,$LocalCompanyID)
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
		user_ID,
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
		if($sql){
			echo "Records inserted successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}