<?php

require_once(__ROOT__ . "controller/Controller.php");

class SparePartController extends Controller
{
	// public function import()
	// {
	// 	$partQuantity=$_REQUEST['quantity'];
	// 	$this->model->getSparePart($PartNumber)-> Model_IncQty($partQuantity);
	
	// }
	public function Con_addSparePart()
	{
		$PartNumber=$_REQUEST['PartNumber'];
		if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Number');
		 		</script>";
		}
		$PartName=$_REQUEST['PartName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$FullName)) 
		{
 			echo "<script>alert('Full Name must be Only letters and white space allowed');
		 		</script>";
		}
		$carName=$_REQUEST['carName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$carName)) 
		{
 			echo "<script>alert('car Name must be Only letters and white space allowed');
		 		</script>";
		}
		$partCountry=$_REQUEST['partCountry'];
		if (!preg_match("/^[a-zA-Z ]*$/",$partCountry)) 
		{
 			echo "<script>alert(' Name must be Only letters and white space allowed');
		 		</script>";
		}
		$partPrice=$_REQUEST['partPrice'];
		if(!preg_match('#^[0-9]+$#', $partPrice))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Price');
		 		</script>";
		}
		$partQuantity=$_REQUEST['partQuantity'];
		if(!preg_match('#^[0-9]+$#', $partQuantity))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Quantity');
		 		</script>";
		}
		$image=$_REQUEST['image'];
		$CarID=$_REQUEST['CarID'];
		$user_ID=$_SESSION['ID'];
		

		
	    else
		$this->model->addSparePart($PartNumber,$PartName,$carName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID);
	}

	public function editSparePart($PartNumber)
	 {
	$PartNumber=$_REQUEST['PartNumber'];
		if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Number');
		 		</script>";
		}
		$PartName=$_REQUEST['PartName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$FullName)) 
		{
 			echo "<script>alert('Full Name must be Only letters and white space allowed');
		 		</script>";
		}
		$carName=$_REQUEST['carName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$carName)) 
		{
 			echo "<script>alert('car Name must be Only letters and white space allowed');
		 		</script>";
		}
		$partCountry=$_REQUEST['partCountry'];
		if (!preg_match("/^[a-zA-Z ]*$/",$partCountry)) 
		{
 			echo "<script>alert(' Name must be Only letters and white space allowed');
		 		</script>";
		}
		$partPrice=$_REQUEST['partPrice'];
		if(!preg_match('#^[0-9]+$#', $partPrice))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Price');
		 		</script>";
		}
		$partQuantity=$_REQUEST['partQuantity'];
		if(!preg_match('#^[0-9]+$#', $partQuantity))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Quantity');
		 		</script>";
		}
		$image=$_REQUEST['image'];
		$image=$_REQUEST['CarID'];

		
	    else

		$this->model->getSparePart($PartNumber)->Model_editSparePart($PartNumber,$PartName,$partCountry,$carName,$partPrice,$partQuantity);
	}

	public function delete($PartNumber)
	{
		// if(empty($_POST['PartNumber']) || empty($_POST['PartName'])|| empty($_POST['partCountry'])||empty($_POST['carName'])||empty($_POST['partPrice'])||empty($_POST['partQuantity'])||empty($_POST['image']))	
	    // {
		//  echo "<script>alert('There is no parts to delete');
		//  </script>";
	    // }
	    // else
		$this->model->getSparePart($PartNumber)->deleteSparePart($PartNumber);
	}
}
?>