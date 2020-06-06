<?php
//data base connection
$con=mysqli_connect("localhost","root","","autosparecar");
//sql query to select the entities needed
$sql="SELECT
		sparepart.PartNumber,
		sparepart.PartName,
		sparepart.partCountry,
		sparepart.partPrice,
		sparepart.partQuantity,
		sparepart.CarID FROM  sparepart 
		";
		//$term is the name of the button in the frontend file 
$term=$_POST['term'];
//print the table of the search ,flixable with the size of the page 
echo"<table width=100%>
<tr><th>Part Number</th>
<th>Part Name</th>
<th>Part Price</th>
<th>Part Country</th>
<th>Part Quantity</th>
<td>add to cart</td>
</tr>";
// if the button is not empty 
if(!empty($term))
{
	//search on the part number by any of the characters (number or Name or country )
$sql=$sql." WHERE PartNumber LIKE '%" .$term."%'
or PartName LIKE '%" .$term. "%'
or partCountry LIKE '%" .$term. "%'";

}
else 
/// the result of the sql is connect and get the sql 
if($result = mysqli_query($con,$sql))
{
	//if the result is avalaible
	//mysqli_num_rows is used to return the number of rows present in the result set 
	if(mysqli_num_rows($result)>0) 
	{
		//to storing the data in the numeric indices of the result array 
		while($row = mysqli_fetch_array($result))
		{
			//fill the array by the data we get from the database table 
			echo"    
			<table border=1 width=100%>
			<tr>
			<td>".$row['PartNumber']."</td>
			<td>".$row['PartName']."</td>
			<td>".$row['partPrice']."</td>
			<td>".$row['partCountry']."</td>
			<td>".$row['partQuantity']."</td>
			
			<td><button type='submit' class='btn btn-warning' name='Show' id='Show' 
			onclick=\"location.href='SpareParts.php?CarID=".$row['CarID']."'\">Check</button><br></td>
			</tr>
			</table>";
		}
	}
	//if the result is not found 
	else
	{
	echo"<tr>
			<td colspan=4> No matches found</td>
		</tr>";
	}
}
//if re
else
{
		echo"<tr>
			<td colspan=4> ERROR:couldn't able to execute $sql.".mysqli_error($con)."</td>
		</tr>";
}
echo"</table>";
mysqli_close($con);

?>
