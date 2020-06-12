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
	
	$username=filter_var($_REQUEST["username"], FILTER_SANITIZE_STRING);
	$hashed_password = hash('sha512', $_REQUEST['password']);
	filter_var($hashed_password, FILTER_SANITIZE_STRING);
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
		
		echo"<script>alert('Welcome $username');
		window.location.href='welcome.php'</script>";
		
	}
	else {
		echo"<script>alert('please register first')</script>";
	}
}
}

?>
