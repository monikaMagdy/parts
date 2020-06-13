<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ ."db/database.php");
class SparePart extends Model
{
	private $PartNumber;
	private $PartName;
	private $partCountry;
	private $partPrice;
	private $partQuantity;
	private $image;
	private $CarID;
	private $user_ID;
	
	function __construct($PartNumber,$PartName="",$partCountry="",$partPrice="",$partQuantity="",$image="",$CarID="",$user_ID="")
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
			$this->partPrice = "";
			$this->partQuantity = "";
			$this->image = "";
			$this->CarID = "";
			$this->user_ID = "";

		}	
	}

	function Model_editSparePart($PartNumber,$PartName,$partCountry,$partPrice)
	{
		$edit = "UPDATE `sparepart` SET PartName='$PartName',partCountry='$partCountry',partPrice='$partPrice' where 
	PartNumber=	'$PartNumber'" ;
 $d1= Database::GetInstance();
 $result = mysqli_query($d1->GetConnection(), $edit);
 if($edit){
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
		$sql1="SELECT `partNumber` FROM `cart` where partNumber=$this->PartNumber";
		$d1= Database::GetInstance();
		$result1 = mysqli_query($d1->GetConnection(), $sql1);
		$sql3="SELECT `PartNumber` FROM `export` where PartNumber=$this->PartNumber";
		$result3= mysqli_query($d1->GetConnection(), $sql3);
		$sql="DELETE FROM `sparepart` WHERE PartNumber=$this->PartNumber";
		 $result = mysqli_query($d1->GetConnection(), $sql);
		 
		if($result!=mysqli_num_rows($result3) && $result!=mysqli_num_rows($result1)){
			echo"<script>alert('You have deleted this part successfully') ;
			window.history.back()</script>";
		} 
		else
		{
			echo"<script>alert('The part you want to delete may exist in cart or your exported part, you have to delete them first') ;
			window.history.back();</script>";
		}
	}
	
	function getSparePart($PartNumber)
	{
		return $this;
	}

	function Model_decreseQty( $PartNumber, $partQuantity)
	{
		
	$edit = "UPDATE `sparepart` SET partQuantity=$this->partQuantity - $partQuantity where  PartNumber=$this->PartNumber";
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $edit);
		
		if($edit)
		{
			echo "updated successfully.";
			$this->readSparePart($this->PartNumber);
		} 
		else
		{
			echo "ERROR: Could not able to execute $edit. " ;
		}
	}
	function Model_IncQty( $PartNumber,$partQuantity)
	{
		
	$inc = "UPDATE `sparepart` SET partQuantity=$this->partQuantity + $partQuantity where  PartNumber=$this->PartNumber";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $inc);
		if($inc){
			echo"<script>alert('You have Imported new parts to your store successfully') ;
			window.history.back()</script>";	
			$this->readSparePart($this->PartNumber);
		} 
		else
		{
			echo "ERROR: Could not able to execute $inc. " ;
		}
	}
	
	function addSparePart($PartNumber,$PartName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID)
	{
		$sql="INSERT INTO `sparepart`
		(
		PartNumber,
		PartName,
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
	 	'$partCountry',
	 	'$partPrice',
	 	'$partQuantity',
		'$image',
	    ".$_GET['id'].",
		".$_SESSION['ID']."
		 

	 	)";
		$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if($result){
			echo "Records inserted successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
	
	
}