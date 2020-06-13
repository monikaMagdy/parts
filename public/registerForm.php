<?php
include"menu.php";
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UserController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UserController($model);
$view = new ViewUser($controller, $model);

		
		if (isset($_GET['action']) && !empty($_GET['action']))
		{
			switch($_GET['action'])
			{
				case 'add':
				echo $view->registerForm();
				break;
				case 'insert':
				$controller->Con_insertUser();
				echo"<script>alert('Thank you for registering.');
				window.location.href='index.php'</script>";
				break;
				case'delete':
					if(!empty($_GET['confirm']) && $_GET['confirm']=="true")
					{
						$controller->Con_deleteUser($_GET['id']);
						echo header('location:registerForm.php?action=show');

					} else{
						echo "<script>
						var r = confirm('Are you sure, You want to delete this user?');
						if (r == true) {
							window.location.href += '&confirm=true'

						}
						else{
							window.location.href='registerForm.php?action=show'
						}

						</script>";
					}
					
				break;
				case'show':
				echo $view->show();
				break;
			}
		}
		
?>