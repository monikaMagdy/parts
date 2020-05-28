<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/SparePart.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/SparePartView.php");

require_once(__ROOT__ . "model/carts.php");
require_once(__ROOT__ . "controller/CartController.php");


$model = new SparePart('1');
$controller = new SparePartController($model);
$view = new ViewSparePart($controller, $model);

$cartModel= new Carts();
$cartController =new CartController($cartModel);

 if (isset($_GET['action']) && !empty($_GET['action']))
  {
  	switch($_GET['action'])
 	{
 		
		case'Import':
			 echo $controller->import($_GET['id'],$_POST['Qty']);
		break;
		case'Export':
				 echo $controller->export($_GET['id'],$_POST["Qty"]);
				break;

		case'cart':
			echo $cartController->Con_addCart();
			break;
			
		

 	}
 }
 else
	echo $view->output();
?>