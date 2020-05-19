<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
//"ID`, `FullName`, `username`, `email`, `password`, `Age`, `phoneNumber`, `Role`"
class Users extends Model 
{
	private $Users;
	function __construct() 
	{
		$this->fillArray();
	}

	function fillArray() 
	{
		$this->Users = array();
		$this->db = $this->connect();
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

		$result = $this->db->query($sql);
		if ($result->num_rows >0){
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
		if($this->db->query($sql) === true)
		{
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
}
?>