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
			//$controller->delete($_GET['id']);
			if(!empty($_GET['confirm']) && $_GET['confirm']=="true")
			{
				$controller->delete($_GET['id']);
				echo "<script>window.history.back()</script>";

			} else{
				echo "<script>
				var r = confirm('Are you sure, You want to delete this part?');
				if (r == true) {
					window.location.href += '&confirm=true'

				}
				else{
					window.history.back();
				}

				</script>";
			}
		
	
 	}
 }
 else
	echo $view->output();
?>