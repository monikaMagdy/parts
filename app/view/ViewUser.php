<?php

require_once(__ROOT__ . "view/View.php");

class ViewUser extends View
{	
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
  
 
<body id="page-top">
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> User</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>';
		$str.="<div class='col-lg-12 text-center'>
		<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Add' id='Add' onclick=\"location.href='registerForm.php?action=add'\">Add User</button>
           <br>
           </br>
           </div>
           </div>";
		$str.="<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Edit' id='Edit' onclick=\"location.href='index.php?action=edit'\">Edit User</button>	
           <br>
           </div>
           </div>";
		$str.="<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='delete' id='delete' onclick=\"location.href='index.php?action=delete'\">Delete User</button>	
           <br>
           </div>
           </div>";
		$str.="<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='registerForm.php?action=show'\">View Users</button>	
           <br>
           </div>
           </div>
           </div>
           </div>
           </div>";
		
		return $str;
	}
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
    $str.="<table class='section-heading text-uppercase' id='items'>";
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
        $str.="</tr>";
    }
      $str.="</table>
      <br>
      <br>";
      $str.="<div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Show' id='Show' onclick=\"location.href='index.php'\">back</button>	
           <br>
           </div>
           </div>";
      return $str;
	}
	function loginForm(){
		$str='<!DOCTYPE html>
			<head>
				<style>
				<html lang="en">
				<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
				<title>Bootstrap Simple Registration Form</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<srcipt src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
				<style type="text/css">
	body{
		color: #fff;
		background: #000000;
		font-family: "Roboto", sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #e9d900;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #e9d900;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #e9d900;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #000000;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	} 
				</style>
			</head>
		<body>
	<div class="signup-form">
 
		<form action="login.php" method="post">
		<h2>Login</h2>
		<p class="hint-text">Please Login</p>
       
		<div>
		  	<div class="form-group">
				<input type="text" name="username" required="required" placeholder="Enter User Name"/>
			</div>
		</div>
		<br>
		<div>
		  	<div class="form-group">
				<input type="password" name="password" required="required" placeholder="Enter password"/>
			</div>
		</div>
		<br>
		<div>
		  	<div class="form-group">
				<input type="submit" name="login" value="Login"/>
			</div>
		</div>
		</form>';
		return $str;
	}

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
				<input type="text" class="form-control" name="FullName" placeholder="Enter your full name"/>
			</div>
		</div>
		<br>
            <div class="row">
              <div class="col-md-6">
			<input type="text" class="form-control" name="username" placeholder="Enter username"/>
			</div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
		<input type="text" class="form-control" name="email" placeholder="Enter email"/>
			</div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
		<input type="password" class="form-control" name="password" placeholder="Enter password"/>
			</div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
		<input type="text"class="form-control" name="Age" placeholder="Enter age"/>
			</div>
			</div>
		<br>
		 <div class="row">
              <div class="col-md-6">
		<input type="text" class="form-control" name="phoneNumber" placeholder="Enter phone"/>
			</div>
			</div>
		<br>
		
		 <div class="row">
              <div class="col-md-6">
		<input type="text" class="form-control" name="Role" placeholder="Enter Role"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div class="form-group">
			<button type="submit" class="btn btn-warning" name="Add">Add</button>
        </div>
        </div>
		</form>';
		return $str;
	}

public function editForm()
	{
		$str='<!DOCTYPE html>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #000000;
		
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #e9d900;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #e9d900;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #e9d900;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #000000;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	} 
</style>
</head>
<body>
<div class="signup-form">


<form action="index.php?action=editaction" method="post">

	<h2>Add User</h2>
		<p class="hint-text">Edit User Information</p>';

		$str='<div class="form-group">
			<div>
				<input type="text" class="form-control" name="FullName" value="'.$this->model->getFullName().'"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="username" value="'.$this->model-> getusername().'"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="email" value="'.$this->model->getEmail().'"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div><input type="text"class="form-control" name="Age" value="'.$this->model->getAge().'"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="phoneNumber" value="'.$this->model->getPhoneNumber().'"/>
			</div>
			</div>
		<br>
		
		<div class="form-group">
			<div><input type="text" class="form-control" name="Role" value="'.$this->model->getRole().'"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div class="form-group">
			<button type="submit" class="btn btn-warning" name="edit">Edit</button>
        </div>
        </div>
		</form>';
		return $str;
	}
}
?>
