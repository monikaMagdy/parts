<?php

define('__ROOT__', "../app/");


require_once(__ROOT__ . "model/carts.php");
require_once(__ROOT__ . "controller/CartController.php");
require_once(__ROOT__."view/ViewCart.php");



$cartModel= new Carts();
$cartController =new CartController($cartModel);
$viewcart= new ViewCart($cartController, $cartModel);
	
	echo $viewcart->output();
?>