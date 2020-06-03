	<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/carts.php");
require_once(__ROOT__ . "controller/CartController.php");
require_once(__ROOT__ . "view/ViewCart.php");
include"menu.php";
$model = new carts();
$controller = new CartController($model);
$view = new ViewCart($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action']))
 {
	switch($_GET['action'])
	{
		case'cart':
			 $controller->Con_addCart($_GET['partNumber'],$_POST['Qty']);
		echo $view->output();
		break;
		case 'delete':
			$controller->delete($_GET['cartID']);
			echo $view->output();
			break;
		case 'deletecart':
			$controller->Condeletecart();
			//echo header("location:Car.php");
	}
}
else
	echo $view->output();

?>
