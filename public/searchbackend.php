<?php
echo'
';
$con=mysqli_connect("localhost","root","","autosparecar");
$sql="SELECT
		sparepart.PartNumber,
		sparepart.PartName,
		sparepart.carName,
		sparepart.partCountry,
		sparepart.partPrice,
		sparepart.partQuantity,
		sparepart.CarID FROM  sparepart 
		";
$term=$_POST['term'];
echo"<table width=100%>
<tr><th>Part Number</th>
<th>Part Name</th>
<th>Part Price</th>
<th>Part Country</th>
<th>Part Quantity</th>
<th>Car Name</th>
<td>add to cart</td>
</tr>";

if(!empty($term)){
$sql=$sql." WHERE PartNumber LIKE '%" .$term."%'
or PartName LIKE '%" .$term. "%'
or carName LIKE '%" .$term. "%'";
}

if($result = mysqli_query($con,$sql)){
if(mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result))
{

echo"    
<table border=1 width=100%>
<tr>
<td>".$row['PartNumber']."</td>
<td>".$row['PartName']."</td>
<td>".$row['partPrice']."</td>
<td>".$row['partCountry']."</td>
<td>".$row['partQuantity']."</td>
<td>".$row['carName']."</td>
<td><button type='submit'  class='btn btn-info btn-block' name='cart' id='cart' ><i class ='fas fa-cart-plus'></i>&nbsp;&nbsp;Add to Cart</button><br></td>
</tr>
</table>";
}
}
else{
	echo"<tr><td colspan=4> No matches found</tr>";
}
}
else{
echo"<tr><td colspan=4> ERROR:
couldn't able to execute $sql."
.mysqli_error($con)."</td></tr>";
}
echo"</table>";
mysqli_close($con);
?>
