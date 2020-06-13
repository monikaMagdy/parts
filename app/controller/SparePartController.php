<?php

require_once(__ROOT__ . "controller/Controller.php");

class SparePartController extends Controller
{
	public function Con_addSparePart($CarID)
	{
		//echo "$CarID";
		$PartNumber=filter_var($_REQUEST['PartNumber'],FILTER_VALIDATE_INT );
		$PartName=filter_var($_REQUEST['PartName'], FILTER_SANITIZE_STRING);
		$partCountry=filter_var($_REQUEST['partCountry'],FILTER_SANITIZE_STRING );
		$partPrice=	filter_var($_REQUEST['partPrice'],FILTER_VALIDATE_INT );
		$partQuantity=filter_var($_REQUEST['partQuantity'],FILTER_VALIDATE_INT );
		$image=	filter_var($_REQUEST['image'], FILTER_SANITIZE_STRING);
		$user_ID=filter_var($_SESSION['ID'], FILTER_VALIDATE_INT);
		
		$this->model->addSparePart($PartNumber,$PartName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID);
	}

	public function editSparePart($PartNumber)
	 {
	
		$PartName	=filter_var($_REQUEST['PartName'], FILTER_SANITIZE_STRING);
	
		$partCountry=filter_var($_REQUEST['partCountry'], FILTER_SANITIZE_STRING);

		$partPrice	=filter_var($_REQUEST['partPrice'],FILTER_VALIDATE_INT );
		
		$this->model->Model_editSparePart($PartNumber,$PartName,$partCountry,$partPrice);
	}

	public function delete($PartNumber)
	{
		$this->model->getSparePart($PartNumber)->deleteSparePart($PartNumber);
	}
	public function import($PartNumber, $partQuantity)
	{
		$this->model->getSparePart($PartNumber)->Model_IncQty($PartNumber, $partQuantity);
	}
	public function export($PartNumber, $partQuantity)
	{
		$this->model->getSparePart($PartNumber)->Model_decreseQty($PartNumber, $partQuantity);
	}

	

}
?>