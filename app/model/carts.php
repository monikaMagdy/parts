<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CartModel.php");
require_once(__ROOT__ ."db/database.php");

class Carts extends Model 
{
	private $carts;
	function __construct()
	{
       $d1= Database::GetInstance();
       $d1->GetConnection();
	   $this->fillArray();
	}

	function fillArray()
	{
		$this->carts=array();
		$result =$this->readCarts();
		while ($row = $result->fetch_assoc()) 
		{
			array_push($this->carts,new Cart($row["id"]) );
		}
	}
	function getCarts()
	{
		$this->fillArray();
		return $this->carts;
	}
	function getcart($id)
	{
		foreach ($this->carts as $cart) 
		{
			if($id == $cart->getid())
			{
				return $cart;
			}
		}
	}
	function readCarts()
	{
		$sql="SELECT * FROM cart";
		 $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows >-1){
			return $result;
		}
		else {
			return false;
		}
	}
	function add_to_Cart( $partNumber , $PartName, $PartPrice, $partQuantity )
	{
		$timStamp="12:21";
		$Qtyprice="UPDATE `cart` SET PartPrice=partQuantity*$PartPrice where PartNumber=PartNumber ";
		if ($Qtyprice)
		{
			echo "Qtyprice done";
		}
		else { echo "Qtyprice failed";}
		$tax="UPDATE `cart` SET totalPrice=partQuantity*$PartPrice*0.14 where PartNumber=PartNumber";
		if ($tax)
		{
			echo "tax done";
		}
		else 
		{
			echo "tax done";
		}
		$sql="INSERT INTO `cart`(`partNumber`, `PartName`, `PartPrice`, `partQuantity`, `timStamp`, `totalPrice`) VALUES ($partNumber,$PartName,$Qtyprice,$partQuantity,$tax)";
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