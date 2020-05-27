<?php

require_once(__ROOT__ . "controller/Controller.php");

class CarController extends Controller
{	
	 function Con_addCart($id)
	{

		$partNumber=$_REQUEST['partNumber'];
		$PartName=$_REQUEST['PartName'];
		$PartPrice=$_REQUEST['PartPrice'];
		$partQuantity=$_REQUEST['partQuantity'];
		$totalPrice=$_REQUEST['totalPrice'];
		$this->model->addcart($partNumber, $PartName,$PartPrice,$partQuantity,$totalPrice);
		
	}

	public function delete($id)
	{
		
		$this->model->getCart($id)->deleteCart($id);
	}
}
?>