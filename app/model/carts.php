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
	   $this->fillArray2();
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
	function fillArray2()
	{
		
		$this->carts=array();
		$result =$this->readCarts();
		$sum=0;
		while ($row = $result->fetch_assoc()) 
		{
			$temp+=$row["PartPrice"]*$row["partQuantity"];
			$sum=$temp+($temp*0.14);
			array_push($this->carts,new Cart($row["id"]) );
		}
		$this->totalPriceWithTax=$sum;

	}

	function getCarts()
	{
		$this->fillArray2();
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
		if ($result->num_rows >0){
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