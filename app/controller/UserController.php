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
		$phoneNumber = filter_var($_REQUEST['phoneNumber'],FILTER_VALIDATE_INT );
		$Role=filter_var($_REQUEST['Role'], FILTER_SANITIZE_STRING );
		
		
			if(!preg_match("/^[a-zA-Z ]*$/",$FullName))
			{
				if(strlen($FullName)>20 || strlen($FullName)<3)
				{
					echo"<script>alert('$FullName is large')</script>";
				}
				echo"<script>alert('$FullName is not valid')</script>";
				
			}
			
			else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
			{
				if(strlen($username)>20 || strlen($username)<3)
				{
					echo"<script>alert('$username is large')</script>";
				}
				echo"<script>alert('$username is not valid')</script>";
				
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				echo"<script>alert('$email is not valid')</script>";
			}
			/*else if(!filter_var("/^(02|0-9)[\d]{7}$/", $phoneNumber))
			{
				echo"<script>alert('$phoneNumber phone must be 11 number')</script>";
			}*/
			else if(!preg_match("/^[a-zA-Z ]*$/",$Role))
			{
				echo"<script>alert('$Role is not valid')</script>";
				
			}
			else
			{	
			$this->model->Model_insertUser($FullName,$username,$email, $hashed_password, $Age, $phoneNumber,$Role);
			}
	}

	public function Con_editUser() 
	{
		$FullName = $_REQUEST['FullName'];
		$username=$_REQUEST['username'];
		$email=$_REQUEST['email'];
		//$password = hash('sha512', $_REQUEST['password']);
		$Age = $_REQUEST['Age'];
		$phoneNumber = $_REQUEST['phoneNumber'];
		$Role=$_REQUEST['Role'];
		
		if (empty( $_REQUEST['FullName'])||empty($_REQUEST['username'])||empty($_REQUEST['email'])||/*empty($_REQUEST['password'])||*/empty($_REQUEST['Age'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['Role']))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
		else 
		$this->model->Model_editUser($FullName,$username,$email/*,$password*/,$Age,$phoneNumber,$Role);
	}
	
	public function Con_deleteUser($id)
	{
		
		$this->model->getUser($id)->Model_deleteUser($id);
	}

	
}
?>
