<?php

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
 		
		case'Import':
			 echo $controller->import($_GET['id'],$_POST['Qty']);
		break;
		case'Export':
				 echo $controller->export($_GET['id'],$_POST["Qty"]);
 	}
 }
 else
	echo $view->output();
?>