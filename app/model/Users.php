<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/database.php");

//"ID`, `FullName`, `username`, `email`, `password`, `Age`, `phoneNumber`, `Role`"
class Users extends Model 
{
	private $Users;
	function __construct() 
	{
        $d1= Database::GetInstance();
        $d1->GetConnection();
		$this->fillArray();
	}

	function fillArray() 
	{
		$this->Users = array();
		$result = $this->readUsers();
		while ($row = $result->fetch_assoc())
		{
			array_push($this->Users, new User($row["ID"],$row["FullName"],$row["username"],$row["email"],$row["password"],$row["Age"],$row["phoneNumber"],$row["Role"]));
		}
	}
function getUsers() {
		$this->fillArray();  
		return $this->Users;
	}

	function getUser($ID)
	{
		foreach($this->Users as $User)
		{
			if ($ID == $User->getID()) {
				return $User;
			}
		}
	}
	/*function getUsers() 
	{
		return $this->Users;
	}*/

	function readUsers()
	{
		$sql = "SELECT * FROM user";

        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows >-1){
			return $result;
		}
		else {
			return false;
		}
	}

	function Model_insertUser($FullName,$username,$email, $password, $Age, $phoneNumber,$Role)
	{
		$search="SELECT * FROM user where username=$username";
		$d2=Database::GetInstance();
		$result2=mysqli_query($d2->GetConnection(), $search);
		if (mysqli_num_rows($result2) > 0)
		{
			echo "<script>alert('this username is already taken , Change the Username.');
				window.history.back();
			</script>"
		}
		else{
		$sql = "INSERT INTO `user` 
		(
		FullName,
		username,
		email,
		password,
		Age,
		phoneNumber,
		Role
		)
		VALUES
		(
		 '$FullName',
		 '$username',
		 '$email',
		 '$password',
		 '$Age',
		 '$phoneNumber',
		 '$Role'
		)";
	 	$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($sql){
			echo "<acript>alert('Records inserted successfully.');
			window.location.href='user.php';</script>";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
	}
}
?>