<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/CartModel.php");


class CartController extends Controller
{	
	 function Con_addCart()
	{
		$partNumber=$_REQUEST['hidden_PartNumber'];
		$PartName=$_REQUEST['hidden_partName'];
		$PartPrice=$_REQUEST['hidden_PartPrice'];
		$partQuantity=$_REQUEST['Qty'];
		
		$this->model->add_to_Cart($partNumber, $PartName,$PartPrice,$partQuantity);
		
	}

	public function delete($id)
	{
		
		$this->model->getCart($id)->deleteCart($id);
	}
}
?>