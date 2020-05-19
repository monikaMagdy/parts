	<?php
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include"menu.php";
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Companys.php");
require_once(__ROOT__ . "controller/CompanyController.php");
require_once(__ROOT__ . "view/CompanyView.php");

$model = new Companys();
$controller = new CompanyController($model);
$view = new CompanyView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action']))
 {
 	/*$controller->{$_GET['action']}();
 	echo"done";*/
	switch($_GET['action'])
	{
		case 'insert':
			echo $view->View_addCompany();
			break;
		case'insertAction':
			$controller->Con_addCompany();
			echo $view->output();
			break;
		case 'edit':
			echo $view->View_editCompany($_GET['id']);
			break;
		case 'editAction':
			$controller->Con_editCompany($_GET['id']);
			echo $view->output();
			break;
		
		case 'delete':
			$controller->Con_delete($_GET['id']);
			echo $view->output();
		
	}
}
else{
	echo $view->output();
}
?>