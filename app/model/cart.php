<?php
require_once(__ROOT__ . "model/Model.php");
class cart extends Model
{	
	$id
	$partNumber;
	$PartName; 
	$PartPrice;
	$partQuantity; 
	$PartImage;

	function add_to_cart($partNumber)
	{
	$stmt=$conn->prepare("SELECT id FROM cart WHERE PartNumber=?
		");
	$query->bind_param("s", $partNumber);
	$stmt -> execute();
	$res =$stmt ->get_result();
	$r =$res->fetech_assoc();
	$code=$r['PartNumber'];

	if (!$code){
		$query=$conn->prepare("INSERT INTO `cart`( `partNumber`, `PartName`, `PartPrice`, `partQuantity`, `PartImage`, `totalPrice`) VALUES(?,?,?,?,?,?)");
		$query->bind_param("sssiss", $PartNumber, $PartName, $partPrice, $partQuantity, $PartImage);
		$stmt -> execute();
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

?>
	