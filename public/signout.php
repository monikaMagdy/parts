<?php
if(!isset($_SESSION)) 
   				{ 
       				session_start(); 
    			} 
include "menu.php";
echo"<script>alert('You're going to signout)</script>";
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	setcookie("username",'',time()-(3600));
	setcookie("password",'',time()-(3600));
}

session_destroy();
header("Location:login.php");

?>