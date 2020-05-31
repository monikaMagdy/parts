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
		case 'edit':
			echo $view->ViewExportEdit($_GET['id']);
		case 'editAction':
			$controller->Con_editExport($_GET['id']);
			echo $view->output();
			break;
		
		case 'delete':
			$controller->Con_deleteExport($_GET['id']);
			echo $view->output();
			break;
		case'history':
			echo $view->ViewHistory();
		break;
		
		}
	}

else
{

	echo $view->output();
}

/*if (isset($_POST['Export']))
{
 $array_id = array_column("partNumber");
    if(!in_array($_GET["id"], $array_id))
	{
		$count = count($_SESSION["order"]);
		$item_array = array(
		'partNumber'=>	$_GET["id"],
		'CarID' => $_POST["hidden_CarID"],
		'CarName' => $_POST["hidden_CarName"],
		'partName'	=>	$_POST["hidden_name"],
		'partPrice'	=>	$_POST["hidden_price"],	
		'partCountry'=>$_POST['partCountry'],
		'partQuantity'	=>	$_POST["quantity"]
		);
    	[$count] = $item_array;
    }
    else
    {
        echo '<script>alert("Item Already Added")</script>';
        echo '<script>window.location="index.php"</script>';
    }
    
}

*/

?>
