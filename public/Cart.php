	<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/carts.php");
require_once(__ROOT__ . "controller/CartController.php");
require_once(__ROOT__ . "view/ViewCart.php");
include"menu.php";
$model = new carts();
$controller = new CartController($model);
$view = new ViewCart($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action']))
 {
	switch($_GET['action'])
	{
		case'cart':
			 $controller->Con_addCart($_GET['partNumber'],$_POST['Qty']);
			 echo $view->output();
			
		break;
		case'getCompanyId':
			$controller->Con_addCompanyId($_POST['CompanyId']);
			//echo header("location:Cart.php");
		//break;
	  // echo $view->output();
	   break;
		case 'delete':
			$controller->delete($_GET['cartID']);
			echo $view->output();
			break;
		case 'deletecart':
		//	echo header("location:Car.php");
			if(!empty($_GET['confirm']) && $_GET['confirm']=="true")
			{
				$controller->export($_GET['partNumber'],$_GET['Qty'],$_GET['cartID']);
				echo header("location:Car.php");

			} else{
				echo "<script>
				var r = confirm('Are you sure, that the customer had already paid the checkout?');
				if (r == true) {
					window.location.href += '&confirm=true'

				}
				else{
					window.location.href='Cart.php?exported=true'
				}

				</script>";
			}
	}
}
else{
    
        $sql="SELECT * from `cart`";
        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
        if (mysqli_num_rows($result)==0) {
            echo"<script>alert('You have to fill your cart first') ;
				window.history.back()</script>";
        } else {
            echo $view->output();
        }
    }

?>
