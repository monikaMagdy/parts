<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/SpareParts.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/SparePartView.php");

$model = new SpareParts($_GET["CarID"]);
$controller = new SparePartController($model);
$view = new ViewSparePart($controller, $model);


echo $view->output();

?>