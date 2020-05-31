<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/CartModel.php");


class CartController extends Controller
{	
	 function Con_addCart($partNumber,$partQuantity)
	{	
		$this->model->add_to_Cart($partNumber,$partQuantity);
		
	}

	public function delete($id)
	{
		$this->model->getcart($id)->deleteCart();
	}
}
?>