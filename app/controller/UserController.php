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
		if (!preg_match("/^[a-zA-Z ]*$/",$FullName)) 
		{
 			echo "<script>alert('Only letters and white space allowed');
		 		</script>";
		}

		$username = $_REQUEST['username'];

		$email=$_REQUEST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
 			echo "<script>alert('Invalid email format, @ is a must');
		 		</script>";
		}

		$hashed_password = hash('sha512', $_REQUEST['password']);

		$Age = $_REQUEST['Age'];
		
		if(!preg_match('#^[0-9]+$#', $Age))
		{
			echo"<script>alert('you have to enter Numeric Value for the Age');
		 		</script>";
		}
		$phoneNumber = $_REQUEST['phoneNumber'];
		if(!preg_match('#^[0-9]+$#', $phoneNumber))

		{
			echo"<script>alert('you have to enter Numeric Value for the phone number');
		 		</script>";
		}
		$Role=$_REQUEST['Role'];
		// if (!$Role="Manger"||$Role="Employee")
		// {
		// 	echo"<script>alert('Please enter the role of the register If Manager Or Employee');
		//  		</script>";

		// }
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
	
	public function Con_deleteUser()
	{
		
		$this->model->Model_deleteUser();
	}

	
}
?>
