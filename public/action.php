<?php

include('C:\xampp\htdocs\parts\app\db\database.php');

if (isset($_POST["PartNumber "]))
{
	$PartNumber=$_REQUEST['partNumber'];
	$PartName=$_REQUEST['PartName'];
	$partPrice=$_REQUEST['PartPrice'];
	$partQuantity=1;
	$Img=$_REQUEST['PartImage'];
	$stmt=$conn->prepare("SELECT partNumber FROM cart WHERE partNumber=?
		");
	$query->bind_param("s", $partNumber);
	$stmt -> execute();
	$res =$stmt ->get_result();
	$r =$res->fetech_assoc();
	$code=$r['PartNumber'];

	if (!$code){
		$query=$conn->prepare("INSERT INTO `cart`( `partNumber`, `PartName`, `PartPrice`, `partQuantity`, `PartImage`) VALUES(?,?,?,?,?, ?)");
		$query->bind_param("sssiss", $PartNumber, $PartName, $partPrice, $partQuantity, $Img);
		$query -> execute();
	echo '<div class="alert alert-success alert-dismissible">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>item added to your cart!</strong> 
</div>';
}
	else {
		echo '<div class="alert alert-success alert-dismissible">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>item already added to your cart!</strong>
</div>';
	}
}
if (isset($_GET['cartItem']) $$ isset($_GET['cartItem'])== "cartItem")
{
	$stmt= $conn->prepeare("SELECT * FROM cart");
	$stmt->execute();
	$stmt ->store_result();
	$rows=$stmt->num-rows;
	echo $rows;
}

?>