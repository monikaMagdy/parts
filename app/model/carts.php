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
		$this->cart=array();
		$result =$this->readCart();
		while($row =$result->fetch_assoc())
		{
			array_push($this->cart,new cart($row["id"]) );
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
			if($id == $cart->getId())
			{
				return $cart;
			}
		}
	}
	function readCarts()
	{
		$sql="SELECT * FROM `cart`";
		 $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
	function add_to_Cart($companyID, $partNumber , $PartName, $PartPrice, $partQuantity, $timStamp, $totalPrice )
	{
		$sql="INSERT INTO `cart`(`companyID` ,`partNumber`, `PartName`, `PartPrice`, `partQuantity`, `timStamp`, `totalPrice`) VALUES ($companyID,$partNumber,$PartName,$PartPrice,$partQuantity,$timStamp,$totalPrice)";
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