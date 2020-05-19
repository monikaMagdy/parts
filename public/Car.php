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
		case 'add':
			echo $view->addCar();
		break;
		case 'addAction':
			$controller->Con_addCar();
			$view->output();
			break;
			case 'edit':
			echo $view->viewEditCar($_GET['id']);
		break;
		case 'editAction':
			$controller->editCar($_GET['id']);
			 $view->output();
			break;
		case'delete':
			$controller->delete($_GET['id']);
			echo $view->output();
	}

}
else
	echo $view->output();

?>
