<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CartModel.php");
require_once(__ROOT__ ."db/database.php");

class Carts extends Model 
{
	private $totalPrice;
	private $carts;
	private $totalPriceWithTax;
	function __construct()
	{
       $d1= Database::GetInstance();
       $d1->GetConnection();
	   $this->fillArray();
	}
	function gettotalPrice() 
	{
		return $this->totalPrice;
	}	
	function gettotalPriceWithTax() 
	{
		return $this->totalPriceWithTax;
	}


	//tax 
	function fillArray()
	{
		
		$this->carts=array();
		$result =$this->readCarts();
		$sum=0;
		while ($row = $result->fetch_assoc()) 
		{
			$sum+=$row["PartPrice"]*$row["partQuantity"];
			$tax=$sum+($sum*0.14);
			array_push($this->carts,new Cart($row["id"]) );
		}
		$this->totalPrice=$sum;
		$this->totalPriceWithTax=$tax;

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

	function add_to_Cart($partNumber,$partQuantity)
	{
		$sql1= "SELECT PartPrice,PartName 
		FROM `sparepart`
		where partNumber=$partNumber";
		$d1= Database::GetInstance();
		$result1 = mysqli_query($d1->GetConnection(), $sql1);
		$row1=mysqli_fetch_array($result1);

		$sql= 
		"INSERT INTO `cart` (partNumber,partQuantity,PartPrice,PartName) 
		 VALUES ($partNumber,$partQuantity,$row1[0],'".$row1[1]."')";

			$result = mysqli_query($d1->GetConnection(), $sql);
				
				if($result)
				{
					echo "Records inserted successfully.";
				} 
				else
				{
					echo "ERROR: Could not able to execute $sql. " ;
				}
	}
	

}