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
		$PartName=$_REQUEST['PartName'];
		$carName=$_REQUEST['carName'];
		$partCountry=$_REQUEST['partCountry'];
		$partPrice=$_REQUEST['partPrice'];
		$partQuantity=$_REQUEST['partQuantity'];
		$image=$_REQUEST['image'];
		$CarID=$_REQUEST['CarID'];
		$user_ID=$_SESSION['ID'];
		

		// if(empty($_POST['PartNumber']) || empty($_POST['PartName'])|| empty($_POST['partCountry'])||empty($_POST['carName'])||empty($_POST['partPrice'])||empty($_POST['partQuantity'])||empty($_POST['image']))	
	    // {
		//  echo "<script>alert('Please Fill The empty spaces');
		//  </script>";
	    // }
	    // else
		$this->model->addSparePart($PartNumber,$PartName,$carName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID);
	}

	public function editSparePart($PartNumber)
	 {
		$PartName=$_REQUEST['PartName'];
		$partCountry=$_REQUEST['partCountry'];
		$carName=$_REQUEST['carName'];
		$partPrice=$_REQUEST['partPrice'];
		$partQuantity=$_REQUEST['partQuantity'];
		// $image=$_REQUEST['image'];
		// $image=$_REQUEST['CarID'];

		// if(empty($_POST['PartNumber']) || empty($_POST['PartName'])|| empty($_POST['partCountry'])||empty($_POST['carName'])||empty($_POST['partPrice'])||empty($_POST['partQuantity'])||empty($_POST['image']))	
	    // {
		//  echo "<script>alert('Please Fill The empty spaces');
		//  </script>";
	    // }
	    // else
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