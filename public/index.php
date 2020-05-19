
<?php
 include"menu.php";
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "controller/UserController.php");
require_once(__ROOT__ . "view/ViewUser.php");


$model = new User($_SESSION["ID"]);
$controller = new UserController($model);
$view = new ViewUser($controller, $model);
 
if (isset($_GET['action']) && !empty($_GET['action']))
 {
 	switch($_GET['action'])
	{
	case 'edit':
		echo $view->editForm();
		break;
	case 'editaction':
			$controller->Con_editUser();
			$view->output();
			break;
	case'delete':
		$controller->Con_deleteUser();
		break;
	
		header("location:welcome.php");	
		}	
}
else {
	echo $view->output();
}

?>