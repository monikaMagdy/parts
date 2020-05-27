<?php
require_once(__ROOT__ . "model/Model.php");
include_once("database.php");

class Car extends Model
{
	private $id;
	private $partNumber;
	private $PartName;
	private $PartPrice;
	private $partQuantity;
	private $totalPrice;
	

	function __construct($id, $partNumber="",$PartName="",$PartPrice="",$partQuantity="",$totalPrice="")
	{
		$this->id = $id;
		
        $d1= Database::GetInstance();
        $d1->GetConnection();
		if(""===$partNumber)
		{
			$this->readCar($id);
		}
		else
		{
			$this->partNumber = $partNumber;
			$this->PartName = $PartName;
			$this->PartPrice = $PartPrice;
			$this->partQuantity = $partQuantity;
			$this->totalPrice = $totalPrice;
			
		}
	}

	function getpartNumber() 
	{
		return $this->partNumber;
	}	
	function setpartNumber($partNumber)
	{
		return $this->partNumber = $partNumber;
	}

	function getPartName() 
	{
		return $this->PartName;
	}
	function setPartName($PartName) 
	{
		return $this->PartName = $PartName;
	}

	function getPartPrice() 
	{
		return $this->PartPrice;
	}
	function setPartPrice($PartPrice) 
	{
		return $this->PartPrice = $PartPrice;
	}

	function getpartQuantity() 
	{
		return $this->partQuantity;
	}	
	function setpartQuantity($partQuantity)
	{
		return $this->partQuantity = $partQuantity;
	}
	function gettotalPrice() 
	{
		return $this->totalPrice;
	}	
	function settotalPrice($totalPrice)
	{
		return $this->totalPrice = $totalPrice;
	}
	function getid()
	{
		return $this->id;
	}

	function readCart($id)
	{
		$sql = "SELECT * FROM cart where id=".$id;

	    $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows == 1)
		{
			$row=mysqli_fetch_array($result);
			$this->partNumber = $row["partNumber"];
			$this->PartName = $row["PartName"];
			$this->PartPrice = $row["PartPrice"];
			$this->partQuantity=$row["partQuantity"];
			$this->totalPrice=$row["totalPrice"];
		}
		else 
		{
			$this->partNumber = "";
			$this->PartName = "";
			$this->PartPrice= "";
			$this->partQuantity="";
			$this->totalPrice="";
		}	
	}


	function deleteCart($id){
	$sql="DELETE FROM cart where id=$this->id;";
	$d1= Database::GetInstance();
	$result = mysqli_query($d1->GetConnection(), $sql);

	if($sql){
		echo "deleted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " ;
	}
}
 }
?>