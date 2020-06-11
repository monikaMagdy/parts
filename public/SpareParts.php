<?php
include"menu.php";
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/SpareParts.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/SparePartView.php");

$model = new SpareParts($_GET["CarID"]);
$controller = new SparePartController($model);
$view = new ViewSparePart($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action']))
  {
  	switch($_GET['action'])
 	{
 		case 'add':
			 echo $view->addSparePart();
		 break;
 		case 'addAction':
             $controller->Con_addSparePart($_GET["id"]);
             echo $view->output();
             break;
    }
}
else
echo $view->output();

?>