<?php

define('__ROOT__', "../app/");


require_once(__ROOT__ . "model/SparePart.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/ViewSearch.php");

$model = new SparePart($_GET["id"]);
$controller = new SparePartController($model);
$view = new ($controller, $model);


 if (isset($_GET['action']) && !empty($_GET['action']))
  {
  	switch($_GET['action'])
 	{
?>