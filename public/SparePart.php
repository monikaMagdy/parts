<?php
//include"menu.php";
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/SparePart.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/SparePartView.php");

$model = new SparePart($_GET["id"]);
$controller = new SparePartController($model);
$view = new ViewSparePart($controller, $model);


 if (isset($_GET['action']) && !empty($_GET['action']))
  {
  	switch($_GET['action'])
 	{
 		
		case 'edit':
			echo $view->viewEditSparePart($_GET["id"]);
		break;
		case 'editAction':
			$controller->editSparePart($_GET['id']);
			echo header("location:Car.php");
		break;
		case'delete':
			$controller->delete($_GET['id']);
		
	
 	}
 }
 else
	echo $view->output();
?>