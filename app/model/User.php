<?php
 require_once(__ROOT__ . "model/Model.php");
 require_once(__ROOT__ ."db/dbh.php");
 include_once("database.php");

?>

<?php

class User extends Model 
{
    private $ID;
    private $FullName;
    private $username;
    private $email;
	  private $password;
    private $Age; 
    private $phoneNumber;
    private $Role;

 function __construct($ID,$FullName="",$username="",$email="",$password="",$Age="",$phoneNumber="",$Role="")
  {
    $this->ID = $ID;
    $d1= Database::GetInstance();
    $d1->GetConnection();
    if(""===$FullName)
    {
      $this->readUser($ID);
    }
    else
    {
      $this->FullName = $FullName;
      $this->username=$username;
      $this->email=$email;
	    $this->password=$password;
      $this->Age = $Age;
      $this->phoneNumber = $phoneNumber;
      $this->Role=$Role;
    }
  }
  function getFullName()
  {
  	return $this->FullName;
  }
  function setFullName($FullName)
  {
  	 return $this->FullName = $FullName;
  }
  function getusername()
  {
  	return $this->username;
  }
  function setusername($username)
  {
  	return $this->username=$username; 
  }
  function getemail()
  {
  	return  $this->email;
  }
  function setemail($email)
  {
  	return  $this->email=$email;
  }
  function getPassword()
  {
  	 $this->password;
  }
  function setPassword($password)
  {
  	 $this->password=$password;
  }
  function getAge() 
  {
    return $this->Age;
  }
  function setAge($Age)
  {
    return $this->Age = $Age;
  }
  
  function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  
  function setphoneNumber($phoneNumber) 
  {
    return $this->phoneNumber = $phoneNumber;
  }

  function getRole()
  {
    return $this->Role;
  }
  function setRole($Role)
  {
    return $this->Role=$Role;
  }

  function getID() 
  {
    return $this->ID;
  }

  function readUser($ID)
  {
  	$user=" SELECT * FROM user where ID=".$ID;
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $user);
    if ($result->num_rows == 1)
    {
        $row=mysqli_fetch_array($result);
        $this->FullName = $row["FullName"];
		    $_SESSION["FullName"]=$row["FullName"];
		    $this->username=$row["username"];
		    $this->email=$row["email"];
		    $this->password=$row["password"];
        $this->Age = $row["Age"];
		    $this->phoneNumber = $row["phoneNumber"];
        $this->Role=$row["Role"];
    }
    else 
    {
    	$this->FullName="";
    	$this->username="";
    	$this->email="";
    	$this->password="";
    	$this->Age="";
    	$this->phoneNumber="";
      $this->Role="";
    }
  }

  function Model_editUser($FullName,$username,$email,$password,$Age,$phoneNumber, $Role)
	{
    $db=$db->GetInstance();
		$editUser="UPDATE user SET FullName='$FullName', username='$username',email='$email',password='$password , Age='$Age', phoneNumber='$phoneNumber' WHERE ID=$this->ID; ";
		if($this->db->query($editUser)===true)
		{
			echo"updated successfully.";
			$this->readUser($this->ID);
		}
		else
		{
            echo "ERROR: Could not able to execute $editUser. " ;
    }

	}

	function Model_deleteUser()
	{
		$deleteUser="DELETE FROM user WHERE ID=$this->ID;";
		$d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $deleteUser);
    if($deleteUser){
			 echo "deletet successfully.";
		}
		else
		{
            echo "ERROR: Could not able to execute $sql. " ;
        }
	}

}
?>