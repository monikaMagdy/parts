<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
include_once("database.php");

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
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}
?>