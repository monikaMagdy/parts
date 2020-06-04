<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ ."db/database.php");

class Cart extends Model
{
	private $id;
	private $companyID;
	private $partNumber;
	private $PartName;
	private $PartPrice;
	private $partQuantity;
	//private $totalParts;
	//private $totalPrice;
	
	

	function __construct($id, $companyID="", $partNumber="",$PartName="",$PartPrice="",$partQuantity=""/*,$totalParts="",$totalPrice=""*/)
	{
		$this->id = $id;
		
        $d1= Database::GetInstance();
        $d1->GetConnection();
		if(""===$partNumber)
		{
			$this->readCart($id);
		}
		else
		{
			$this->companyID = $companyID;
			$this->partNumber = $partNumber;
			$this->PartName = $PartName;
			$this->PartPrice = $PartPrice;
			$this->partQuantity = $partQuantity;
			/*$this->totalParts = $totalParts;
			$this->totalPrice = $totalPrice;*/
			
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
	/*function gettotalParts() 
	{
		return $this->totalParts;
	}	
	function settotalParts($totalParts)
	{
		return $this->totalParts = $totalParts;
	}*/

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
		
		}
		else 
		{
			$this->companyID = "";
			$this->partNumber = "";
			$this->PartName = "";
			$this->PartPrice= "";
			$this->partQuantity="";
		
		}	
	}

function add_to_Cart($partNumber,$partQuantity)
{
	$sql= 
	"INSERT INTO `cart` (partNumber,partQuantity,PartPrice,PartName) 
	SELECT partNumber,partQuantity,PartPrice,PartName 
	FROM `sparepart`
	where partNumber=$this->partNumber AND partQuantity=$this->partQuantity";
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
function Model_decreseQty( $PartNumber, $partQuantity)
{


$edit="Update `sparepart` INNER JOIN `cart` ON sparepart.partNumber = cart.partNumber SET sparepart.partQuantity = sparePart.partQuantity - cart.partQuantity where sparepart.PartNumber =$PartNumber ";
$d1= Database::GetInstance();
$result = mysqli_query($d1->GetConnection(), $edit);
	
	if($result)
	{
		echo "updated successfully.";
		//$this->readSparePart($this->PartNumber);
	} 
	else
	{
		echo "ERROR: Could not able to execute $edit. " ;
	}
	$sql="DELETE FROM `cart`"; 
	//$d1= Database::GetInstance();
	$result1 = mysqli_query($d1->GetConnection(), $sql);
	if ($result1){
		echo "The customer has paid the checkout successfully.";
	}
	else {
		echo "ERROR: Could not able to execute $sql. ";
	}
}
function deleteCart()
{
$sql="DELETE FROM cart where id=$this->id";
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