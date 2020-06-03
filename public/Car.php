	<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/CarsModel.php");
require_once(__ROOT__ . "controller/CarController.php");
require_once(__ROOT__ . "view/CarView.php");
include"menu.php";
$model = new Cars();
$controller = new CarController($model);
$view = new ViewCar($controller, $model);
//
/*/
*/

if (isset($_GET['action']) && !empty($_GET['action']))
 {

 	switch($_GET['action'])
	{
		//'add' referes to the name of the action to redirect in this swithch case 
		case 'add':
			echo $view->addCar();
			break;
		case 'addAction':
			$controller->Con_addCar();
			echo header("location:Car.php");
			break;
		case 'edit':
			echo $view->viewEditCar($_GET['id']);
			break;
		case 'editAction':
			$controller->editCar($_GET['id']);
			echo header("location:Car.php");
			break;
		case'delete':
			$controller->delete($_GET['id']);
			echo header("location:Car.php");
	}

}
else
	echo $view->output();

?>
