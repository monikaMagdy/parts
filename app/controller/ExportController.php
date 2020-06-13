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
		$CompanyID=		filter_var($_REQUEST['companyID'] ,FILTER_VALIDATE_INT);
		$PartNumber=	filter_var($_REQUEST['PartNumber'] ,FILTER_VALIDATE_INT);
		$PartName=		filter_var($_REQUEST['PartName'], FILTER_SANITIZE_STRING);
		$partQuantity = filter_var($_REQUEST['partQuantity'] ,FILTER_VALIDATE_INT);
		$itemPrice = 	filter_var($_REQUEST['itemPrice'], FILTER_VALIDATE_INT);
		$totalPrice = 	filter_var($_REQUEST['totalPrice'], FILTER_VALIDATE_FLOAT);
		$totalPrice = 	filter_var($_REQUEST['totalPrice'], FILTER_VALIDATE_FLOAT);
		$this->model->getExport($idExport)->
		Model_editExport($companyID,$PartNumber,$PartName,$partQuantity,$itemPrice,$totalPrice);
	}

	public function Con_deleteExport($IDExport)
	{

		
		$this->model->getExport($IDExport)->Model_deleteExport();
	}
}
?>