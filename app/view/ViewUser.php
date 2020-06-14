<?php

require_once(__ROOT__ . "view/View.php");

class ViewUser extends View
{	//button used to redirect on other pages.
	public function output()
	{
		$str="";
		$str.='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>
 <br>
 <br> 
 
<body id="page-top">
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> User</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
	  </div>';
	  if($_SESSION["Role"]==='Manger' )
	  {
		$str.="<div class='col-lg-12 text-center'>
				<div class='portfolio-caption'>
           			<div class='btn-group btn-group-lg'>
           				<button type='submit' class='btn btn-warning' name='Add' id='Add' onclick=\"location.href='registerForm.php?action=add'\">Add User</button></br></br>
           			</div>
           		</div>";
		$str.="</br></br>
				<div class='portfolio-caption'>
           			<div class='btn-group btn-group-lg'>
           				<button type='submit' class='btn btn-warning' name='Edit' id='Edit' onclick=\"location.href='user.php?action=edit'\">Edit User</button>
           			</div>
           		</div>";
				$str.="<br><br>
				<div class='portfolio-caption'>
		           <div class='btn-group btn-group-lg'>
        			   <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='registerForm.php?action=show'\">View Users</button>
           			</div>
           		</div>
           </div>
        </div>
    </div>";
	  }
	  else 
	  {
		  	$str.="<div class='col-lg-12 text-center'>
				<div class='portfolio-caption'>
           			<div class='btn-group btn-group-lg'>
           				<button type='submit' class='btn btn-warning' name='Edit' id='Edit' onclick=\"location.href='user.php?action=edit'\">Edit User</button>
           			</div>
				   </div>
				   </div>
        </div>
    </div>";
	  }
		return $str;
	}

	//return all users work in the company 
	function show()
	{
$str='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>
  
 
<body id="page-top">
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> View Users</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">';
    $str.="<table class='section-heading' id='items'>";
    $str.="<tr>
    	<th>user Full name</th>
    	<th>user Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Role</th>
          </tr>";
      $str.="<tr>";
      foreach($this->model->getUsers() as $User){
        $str.="<td>".$User->getFullName()." </td> ";
        $str.="<td>".$User->getusername()."</td> ";
        $str.="<td>".$User->getEmail()."</td> ";
       	$str.="<td>".$User->getPhoneNumber()."</td> ";
        $str.="<td>".$User->getRole() ."</td> ";
        $str.="<td><br><br>
				<div class='portfolio-caption'>
           			<div class='btn-group btn-group-lg'>
						   <button type='submit' class='btn btn-warning' name='delete' id='delete' 
						   onclick=\"location.href='registerForm.php?action=delete&id=".$User->getID()."'\">Delete User</button>
           			</div>
           		</div></td>";

        $str.="</tr>";

    }
      $str.="</table>
      <br>
      <br>";
      $str.="<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='user.php'\">back</button>	
           <br>
           </div>
           </div>";
      return $str;
	}


	// login form to login 
	function loginForm()
	{
		$str = "";
     $str.='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>
  
 
<body id="page-top">
<br>
<br>
<br>
<br>

<body id="page-top">
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> Login</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
		<form action="login.php" method="post">
		
       
		<div class="row">
              <div class="col-md-6">
				<input type="text" class="form-control"	 name="username" required="required" placeholder="Enter User Name"/>
			</div>
		</div>
		<br>
		<div class="row">
              <div class="col-md-6">
				<input type="password" class="form-control" name="password" required="required" placeholder="Enter password"/>
			</div>
		</div>
		<br>
		<div class="portfolio-caption">
           <div class="col-lg-12 text-center">
           <div class="btn-group btn-group-lg">
				<input type="submit"class="btn btn-warning" class="btn btn-primary btn-xl text-uppercase" name="login" value="Login"/>
			</div>
		</div>
		</div>
		<a href="../public/resetpass.php">Reset Password</a>
		</form>
		</div>';
		return $str;
	}

	//the registeration form 
	function registerForm()
	{
     $str='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>
  
 
<body id="page-top">
<br>
<br>
<br>
<br>
<br>

      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">User Information</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
		
<form action="registerForm.php?action=insert" method="post">
		<div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
			  <input type="text" pattern="[A-Za-z]{3,}" title="min 3 characters and no special or numiric characters" class="form-control" required="required" name="FullName" maxlength="10" placeholder="Enter your full name"/>
			  </div>
		</div>
		<br>
            <div class="row">
              <div class="col-md-6">
			  <input type="text" class="form-control" name="username" required="required" placeholder="Enter your username"/>
			  </div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
			  <input type="text" pattern="[a-zA-Z0-9!#$%&*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="valid mail is required" class="form-control" validate="required:true" name="email" placeholder="Enter your email"/>
			  </div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
			  <input type="password" class="form-control" required="required" name="password" placeholder="Enter your password"/>
			  </div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
			  <input type="text" pattern="[0-9]{2}" title="numiric characters" class="form-control" name="Age" required="required" placeholder="Enter your age"/>
			  </div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
			  <input type="text" class="form-control" pattern="[0-9]{11}" title="numiric characters and 11 number" name="phoneNumber" required="required" placeholder="Enter your phone"/>
			  </div>
			</div>
		<br>
		
		 <div class="row">
              <div class="col-md-6">
		<p>
				<select name="Role"class="btn btn-warning">
					<option value="">..Select..</option>
					<option value="Manager">Manager</option>
					<option value="Employee">Employee</option>
				</select>
			</p>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div class="form-group">
			<button type="submit" class="btn btn-warning" name="Add">Add</button>
        </div>
        </div>
		</form>';
		  $str.="<div class='col-lg-12 text-center'>
		  <div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='index.php'\">back</button>	
           <br>
           </div>
           </div>";
		return $str;
	}

//edit form that return the values of current user 
public function editForm()
	{
		$str="";
		$str.='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>';
  
 
$str.='<br>
<br>
<br>
<br>
<br>
<body id="page-top">
      			<div class="row">
        			<div class="col-lg-12 text-center">
          				<h2 class="section-heading text-uppercase"> Employee Information</h2>
          				<h3 class="section-subheading text-muted"> </h3>
        			</div>
     			</div>
<form action="index.php?action=editaction" method="post">
	<div class="row">
	<div class="col-lg-12 text-center">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              	<div class="col-md-6">
					<h2 class="section-heading">Edit User</h2>
						<p class="section-subheading text-muted">Edit User Information</p>
					<h3 class="section-subheading text-muted"> </h3>
				</div>
			</div>';
		$str.='

			<div class="row">
			<div class="col-lg-12 text-center">
            	<div class="col-md-6">
					<input type="text" class="form-control" required="required" name="FullName" value="'.$this->model->getFullName().'"/>
				</div>
			</div>
			</div>

			<br>
			<div class="row">
				<div class="col-md-6">
					<input type="text" class="form-control" required="required" name="username" value="'.$this->model-> getusername().'"/>
				</div>
				</div>
			</div>
		<br>

		<div class="row">
		<div class="col-lg-12 text-center">
            <div class="col-md-6">
            	<input type="text" class="form-control" required="required" name="email" value="'.$this->model->getEmail().'"/>
			</div>
			</div>
			</div>
		<br>
		<div class="row">
		<div class="col-lg-12 text-center">
              <div class="col-md-6">
		<input type="text"class="form-control" required="required" name="Age" value="'.$this->model->getAge().'"/>
			</div>
			</div>
			</div>
		<br>
		<div class="row">
		<div class="col-lg-12 text-center">
              <div class="col-md-6">
		<input type="text" class="form-control" required="required" name="phoneNumber" value="'.$this->model->getPhoneNumber().'"/>
			</div>
			</div>
			</div>
		<br>
		<div class="row">
		<div class="col-lg-12 text-center">
            <div class="col-md-6">
				<input type="text" class="form-control" required="required"  name="Role" value="'.$this->model->getRole().'"/>
			</div>
			</div>
		</div>
		<br>
		<div class="row">
		<div class="col-lg-12 text-center">
            <div class="col-md-6">
				<button type="submit" class="btn btn-warning" name="edit">Edit</button>
        	</div>
        	</div>
        	</div>
		</form>
		</div>
		</div>
		</form>';
		  $str.="<div class='col-lg-12 text-center'>
		  <div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='index.php'\">back</button>	
           <br>
           </div>
           </div>
           </div>";
		return $str;
	}
}
?>
