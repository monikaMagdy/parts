<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
require_once(__ROOT__ . "controller/Controller.php");
class UserController extends controller
{
	public function Con_insertUser()
	{
		$FullName =filter_var($_REQUEST['FullName'], FILTER_SANITIZE_STRING);
		$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING) ;
		$email=filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL );
		$hashed_password = filter_var(hash('sha512', $_REQUEST['password']), FILTER_SANITIZE_STRING) ;
		$Age = filter_var($_REQUEST['Age'],FILTER_VALIDATE_INT );
		$phoneNumber = $_REQUEST['phoneNumber'];/*filter_var(*//*,FILTER_VALIDATE_INT )*/
		$Role=filter_var($_REQUEST['Role'], FILTER_SANITIZE_STRING );
		$this->model->Model_insertUser($FullName,$username,$email, $hashed_password, $Age, $phoneNumber,$Role);
	}

	public function Con_editUser() 
	{
		$FullName =filter_var($_REQUEST['FullName'], FILTER_SANITIZE_STRING);
		$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING) ;
		$email=filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL );
		$Age = filter_var($_REQUEST['Age'],FILTER_VALIDATE_INT );
		$phoneNumber = filter_var($_REQUEST['phoneNumber'],FILTER_VALIDATE_INT );
		$Role=filter_var($_REQUEST['Role'], FILTER_SANITIZE_STRING );
		if (empty( $_REQUEST['FullName'])||empty($_REQUEST['username'])||empty($_REQUEST['email'])||empty($_REQUEST['Age'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['Role']))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
		else 
		$this->model->Model_editUser($FullName,$username,$email,$Age,$phoneNumber,$Role);
	}
	
	public function Con_deleteUser($id)
	{
		$this->model->getUser($id)->Model_deleteUser($id);
	}
}
?>
