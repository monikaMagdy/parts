	<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Exports.php");
require_once(__ROOT__ . "controller/ExportController.php");
require_once(__ROOT__ . "view/ViewExport.php");
 
$model = new Exports();
$controller = new ExportController($model);
$view = new ViewExport($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])){

 	switch($_GET['action'])
	{
		case'export':
			$controller->Con_insertExport();
			break;
		}
}
else
{
echo $view->output();
}



?>
