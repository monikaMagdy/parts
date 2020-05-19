<?php

//define('__ROOT__', "../lib/");
require_once(__ROOT__ . "view/View.php");


class ViewCar extends View
{
    public function output()
    {
        $str='<!DOCTYPE html>
<html lang="en">

<head>
<style>
body{
		color: #fff;
		background: #000000;
		
	}
</style>
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

        $str.="<section class='bg-light page-section' id='portfolio'>
			   <div class='container'>
			   <div class='row'>
						 <div class='col-lg-12 text-center' >
						   <h2 class='section-heading text-uppercase'>Export/Import</h2>
						   <h3 class='section-subheading text-muted'>Auto Spare Parts.</h3>
						    <div class='col-lg-12 text-center'>
					 <div class='portfolio-caption'>
					 <div class='btn-group btn-group-lg'>
					 <button type='submit' class='btn btn-warning' name='Add' id='Add' onclick=\"location.href='Car.php?action=add'\">Add</button>
					 <br>
						   </div>
						   </div> 
						   <br>
					 
					  <div class='row'>
       
						";
                        
        foreach ($this->model->getCars() as $Car) {
            $str.="
					 <div class='col-md-4 col-sm-6 portfolio-item' >
					 <a type ='submit' class='portfolio-link' data-toggle='modal' onclick=\"location.href='SpareParts.php?CarID=".$Car->getCarID()."'\" >
					   <div class='portfolio-hover'>
						 <div class='portfolio-hover-content'>
						   <i class='fas fa-plus fa-3x'></i>
						 </div>
					   </div>
                          <img class='img-fluid' src='img/portfolio/".$Car->getimgName()."'>
					  
				    	 </a>
					 <div class='portfolio-caption'>
					 <div class='btn-group btn-group-lg'>
				
				<button type='submit' class='btn btn-warning' name='Edit' id='Edit' onclick=\"location.href='Car.php?action=edit&id=".$Car->getCarID()."'\">Edit</button>
				<button type='submit' class='btn btn-warning' name='Delete' id='Delete' onclick=\"location.href='Car.php?action=delete&id=".$Car->getCarID()."'\">Delete Car</button>


			</div>
				<br><br>
					 <h3>" .$Car->getCarName()."</h3>
					  <h4>" .$Car->getCarModel() ."</h4> 
					  <h5>" .$Car->getCarYear() ."</h5> 
	  <p class='text-muted'>  Press to check ".$Car->getCarName() ." parts </p> 
					  </div>
					</div>
					";
        }
                
                    
                    
        return $str;
    }

    public function addCar()
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
		

<form action="Car.php?action=addAction" method="post">
<div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
	<h2>Add Car</h2>
		<p class="hint-text">Car Infromation</p>

		<div class="form-group">
		<div><input type="text" class="form-control" required="required" name="CarName" id="CarName" placeholder="Enter Car Name"/>
		</div>
		</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" required="required" name="CarModel" id="CarModel" placeholder="Enter Car Model"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div>
			<input type="text" class="form-control" required="required" name="CarYear" id="CarYear" placeholder="Enter Year"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" required="required" name="imgName"  id="imgName" placeholder="Imge Name"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="form-group" >
				<button type="submit" class="btn btn-warning" required="required" name="Add" id="Add">Add</button>
        	</div></form>
        </div>
		';
        return $str;
	}
	
	


    public function viewEditCar($id)
    {
        $str = "";
        $str.="<table>";
        $str.="<tr><th>Name</th><th>Model</th><th>Year</th><th>Action</th></tr>";
        foreach ($this->model->getCars() as $Car) {
            if ($Car->getCarID()===$id) {
                $str.="<tr>";
                $str.="<form 
				action='Car.php?action=editAction&id=".$Car->getCarID()."' method='post'>";
                $str.="<td><input type='text' required='required' name='CarName' value='".$Car->getCarName() ."'>  </td> ";
                $str.="<td><input type='text' required='required' name='CarModel' value='".$Car->getCarModel() ."'></td> ";
                $str.="<td><input type='text' required='required' name='CarYear' value='".$Car->getCarYear() ."'>
				</td> ";
                $str.="<td><input type='submit' value='Change'/></td>";
                $str.="</form>";
                $str.="</tr>";
            }
        }
    
        $str.="<a href='Car.php'>Back to Cars </a>";
        return $str;
    }
}
	?>

	<!--- Add more models---->



	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
	<!-- Plugin JavaScript -->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
	<!-- Contact form JavaScript -->
	<script src="js/jqBootstrapValidation.js"></script>
	<script src="js/contact_me.js"></script>
	<script src="js/portfolio.js"></script>
  
	<!-- Custom scripts for this template -->
	<script src="js/agency.min.js"></script>

