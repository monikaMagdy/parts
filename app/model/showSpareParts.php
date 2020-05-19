<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/CarModel.php");
require_once(__ROOT__ . "controller/CarController.php");
require_once(__ROOT__ . "view/CarView.php");

require_once(__ROOT__ . "model/SpareParts.php");
require_once(__ROOT__ . "controller/SparePartController.php");
require_once(__ROOT__ . "view/SparePartView.php");


$model = new Car();
$controller = new CarController($model);
$view = new ViewCar($controller, $model);


$SPmodel = new SpareParts();
$SPcontroller = new SparePartController($model);
$SPview = new SparePartView($controller, $model);



?>