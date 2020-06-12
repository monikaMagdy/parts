<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CartModel.php");
require_once(__ROOT__ ."db/database.php");

class Carts extends Model
{
    private $totalPrice;
    private $carts;
    private $totalPriceWithTax;
    public function __construct()
    {
        $d1= Database::GetInstance();
        $d1->GetConnection();
        $this->fillArray();
    }
    public function gettotalPrice()
    {
        return $this->totalPrice;
    }
    public function gettotalPriceWithTax()
    {
        return $this->totalPriceWithTax;
    }


    //tax
    public function fillArray()
    {
        $this->carts=array();
        $result =$this->readCarts();
        $sum=0;
        while ($row = $result->fetch_assoc()) {
            $sum+=$row["PartPrice"]*$row["partQuantity"];
            $tax=$sum+($sum*0.14);
            array_push($this->carts, new Cart($row["id"]));
        }
        $this->totalPrice=$sum;
        $this->totalPriceWithTax=$tax;
    }

    public function getCarts()
    {
        $this->fillArray();
        return $this->carts;
    }
    public function getcart($id)
    {
        foreach ($this->carts as $cart) {
            if ($id == $cart->getid()) {
                return $cart;
            }
        }
    }
    public function readCarts()
    {
        $sql="SELECT * FROM cart";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
        if ($result->num_rows >-1) {
            return $result;
        } else {
            return false;
        }
    }


    public function addCompanyId($CompanyId)
    {
		$sql1="SELECT `LocalCompanyID` FROM `localcompany` where `LocalCompanyID`=$CompanyId";
		$d1= Database::GetInstance();
		$result1=mysqli_query($d1->GetConnection(), $sql1);
        $sql="UPDATE `cart` SET `companyID`=$CompanyId";
		$result = mysqli_query($d1->GetConnection(), $sql);
		if($result!=$result1){
			?>
<script>alert('The Company Id you have entered does not exist') ;
window.location.href= 'Cart.php';</script>
			<?
		}
		else{
			echo header("location:Cart.php");
		}
		
            
        // if ($result) {
        //     echo "updated successfully.";
        // //$this->readCart($this->id);
        // } else {
        //     echo "ERROR: Could not able to execute $sql. " ;
        // }
    }
    
    public function add_to_Cart($partNumber, $partQuantity)
    {
        $sql1= "SELECT PartPrice,PartName 
		FROM `sparepart`
		where partNumber=$partNumber";
        $d1= Database::GetInstance();
        $result1 = mysqli_query($d1->GetConnection(), $sql1);
        $row1=mysqli_fetch_array($result1);
        $sql2="SELECT partNumber FROM `cart` where partNumber=$partNumber";
        $result2 = mysqli_query($d1->GetConnection(), $sql2);
        if (mysqli_num_rows($result2) == 0) {
            $sql=
        "INSERT INTO `cart` (partNumber,partQuantity,PartPrice,PartName) 
		 VALUES ($partNumber,$partQuantity,$row1[0],'".$row1[1]."')";
            $result = mysqli_query($d1->GetConnection(), $sql);
           // $row=mysqli_fetch_array($result);
    
                
            if ($result) {
                echo "Records inserted successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " ;
            }
        } else {
            $sql3=
        "UPDATE `cart` SET  partNumber=$partNumber,partQuantity=$partQuantity where partNumber=$partNumber";
            $result3 = mysqli_query($d1->GetConnection(), $sql3);
            $row3=mysqli_fetch_array($result3);
        }
    }
}
	?>

