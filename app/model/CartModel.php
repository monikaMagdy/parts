<?php
require_once(__ROOT__ . "model/Model.php");
include_once("database.php");

class Cart extends Model
{
	private $id;
	private $companyID;
	private $partNumber;
	private $PartName;
	private $PartPrice;
	private $partQuantity;
	private $timStamp;
	private $totalPrice;
	
	

	function __construct($id, $companyID="", $partNumber="",$PartName="",$PartPrice="",$partQuantity="",$timStamp="",$totalPrice="")
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
			$this->companyID = $companyID;
			$this->partNumber = $partNumber;
			$this->PartName = $PartName;
			$this->PartPrice = $PartPrice;
			$this->partQuantity = $partQuantity;
			$this->timStamp = $timStamp;
			$this->totalPrice = $totalPrice;
			
		}
	}

	function getcompanyID() 
	{
		return $this->companyID;
	}	
	function setcompanyID($companyID)
	{
		return $this->companyID = $companyID;
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
	function gettimStamp() 
	{
		return $this->timStamp;
	}	
	function settimStamp($timStamp)
	{
		return $this->timStamp = $timStamp;
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
			$this->companyID = $row["partNumber"];
			$this->partNumber = $row["partNumber"];
			$this->PartName = $row["PartName"];
			$this->PartPrice = $row["PartPrice"];
			$this->partQuantity=$row["partQuantity"];
			$this->timStamp=$row["timStamp"];
			$this->totalPrice=$row["totalPrice"];
		}
		else 
		{
			$this->companyID = "";
			$this->partNumber = "";
			$this->PartName = "";
			$this->PartPrice= "";
			$this->partQuantity="";
			$this->timStamp = "";
			$this->totalPrice="";
		}	
	}
	function CalculatePartPrice($partNumber,$partQuantity){
		$sql="UPDATE `cart` SET totalPrice=$this->partQuantity*$PartPrice where PartNumber=$this->PartNumber ";
		$d1= Database::GetInstance();
		$result = mysqli_query($d1->GetConnection(), $sql);
			
			if($sql)
			{
				echo "updated successfully.";
				$this->readCart($this->id);
			} 
			else
			{
				echo "ERROR: Could not able to execute $sql. " ;
			}
		}
	
    function CalculateTax($partNumber, $partQuantity)
    {
        $sql="UPDATE `cart` SET totalPrice=$totalPrice+$this->partQuantity*$PartPrice*0.14 where PartNumber=$this->PartNumber";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
            
        if ($sql) {
            echo "updated successfully.";
            $this->readCart($this->id);
        } else {
            echo "ERROR: Could not able to execute $sql. " ;
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