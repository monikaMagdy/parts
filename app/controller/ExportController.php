<?php

require_once(__ROOT__ . "controller/Controller.php");

class ExportController extends controller
{
	public function Con_insertExport()
	{
	
		$this->model->Model_insertExport();
	}

	public function Con_editExport($idExport) 
	{
		$CompanyID=$_REQUEST['companyID'];
		//$CarID = $_REQUEST['CarID'];
		$PartNumber=$_REQUEST['PartNumber'];
		$PartName=$_REQUEST['PartName'];
		$partQuantity = $_REQUEST['partQuantity'];
		$itemPrice = $_REQUEST['itemPrice'];
		$totalPrice = $_REQUEST['totalPrice'];

		// if(empty($_REQUEST['companyID']) || empty($_REQUEST['CarID'])|| empty($_REQUEST['PartNumber'])||empty($_REQUEST['PartName'])||empty($_REQUEST['partQuantity'])||empty($_REQUEST['itemPrice'])||empty($_REQUEST['totalPrice']))	
	    // {
		//  echo "<script>alert('Please Fill The empty space');
		//  </script>";
	    // }
	    // else
		$this->model->getExport($idExport)->
		Model_editExport($companyID,$PartNumber,$PartName,$partQuantity,$itemPrice,$totalPrice);
	}

	public function Con_deleteExport($IDExport)
	{

		
		$this->model->getExport($IDExport)->Model_deleteExport();
	}
}
?>