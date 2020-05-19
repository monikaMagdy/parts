<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UserController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UserController($model);
$view = new ViewUser($controller, $model);

/*if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}*/

echo $view->loginForm();
if(isset($_POST["login"]))	
{
	
	$username=$_REQUEST["username"];
	$hashed_password = hash('sha512', $_REQUEST['password']);
	if (empty($_REQUEST['username'])|| empty($_REQUEST['password']))
	{
		 echo "<script>alert('Please Fill The empty spaces');
		 </script>";
	}
	else{

	$sql = "SELECT * FROM user where username='$username' and password='$hashed_password' ";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1)
	{
		$row = $dbh->fetchRow();
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["Role"]=$row["Role"];
		header("Location:welcome.php");
	}
}
}

?>
