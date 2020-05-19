<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once(__ROOT__ . "controller/Controller.php");
//"ID`, `FullName`, `username`, `email`, `password`, `Age`, `phoneNumber`, `Role`"
class UserController extends controller
{
	//Manger
	public function Con_insertUser()
	{
		

		$FullName = $_REQUEST['FullName'];
		$username = $_REQUEST['username'];
		$email=$_REQUEST['email'];
		$hashed_password = hash('sha512', $_REQUEST['password']);
		$Age = $_REQUEST['Age'];
		$phoneNumber = $_REQUEST['phoneNumber'];
		$Role=$_REQUEST['Role'];

		if (empty( $_REQUEST['FullName'])||empty($_REQUEST['username'])||empty($_REQUEST['email'])||empty($_REQUEST['password'])||empty($_REQUEST['Age'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['Role']))
		{
				echo "<script>alert('Please Fill The empty space');
		 		</script>";
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
		$password = hash('sha512', $_REQUEST['password']);
		$Age = $_REQUEST['Age'];
		$phoneNumber = $_REQUEST['phoneNumber'];
		$Role=$_REQUEST['Role'];
		
		if (empty( $_REQUEST['FullName'])||empty($_REQUEST['username'])||empty($_REQUEST['email'])||empty($_REQUEST['password'])||empty($_REQUEST['Age'])||empty($_REQUEST['phoneNumber'])||empty($_REQUEST['Role']))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
		else 
		$this->model->Model_editUser($FullName,$username,$email,$password,$Age,$phoneNumber,$Role);
	}
	
	public function Con_deleteUser()
	{
		
		$this->model->Model_deleteUser();
	}

	//Employee
/*	public function Con_insertEmployee() 
	{
		$EmployName = $_REQUEST['EmployName'];
		$UserName = $_REQUEST['UserName'];
		$Email=$_REQUEST['Email'];
		$SocialID=$_REQUEST['SocailID'];
		$age = $_REQUEST['age'];
		$phoneNumber = $_REQUEST['phoneNumber'];
		$address=$_REQUEST['address'];
		
		if (empty($EmployName)||empty($UserName)||empty($Email)||empty($SocailID)||empty($age)||empty($phoneNumber)||empty($address))
		{
		echo "<script>alert('Please Fill The empty space');
		 </script>";
		}
		else 

		$this->model->insertEmployee($EmployName,$UserName,$Email,$SocialID,$age,$phone);
	}*/
}
?>
