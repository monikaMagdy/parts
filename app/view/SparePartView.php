<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

include"View.php";

class ViewSparePart extends View
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
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
		<br><br>
		<body>
		<div class=""></div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>';

			$str.="<br>
			<br>
			<br>
			
			<button type='submit'class='btn btn-warning btn-block' name='Add' id='Add'
					    onclick=\"location.href='SpareParts.php?action=add&CarID=".$_GET['CarID']."'\">Click to add Spare part</button>";
				
            $str.='
		<div class="container">
		 <div class="row mt-2 pb-3">';
            foreach ($this->model->getSpareParts() as $SparePart) {
                $str.='<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
		  			<div class="card-deck">
					   <div class="card p-2 border-seconadry mb-2">
					 
		  			 <img src="img/'.$SparePart->getimage() .' "class="card-img-top" hight="250"/><b1r><br><hr>
		  			 <div class="card-body p-1">
		  			 
		  			 	<h5 class="card-title text-center text-secondary" name="partName">PartName: '.$SparePart->getPartName() .'</h5>
						<h5 class="card-title text-center text-secondary" name="partNumber">PartNumber: '.$SparePart->getPartNumber() .'</h5>
						
						<h5 class="card-title text-center text-secondary" name="partCountry">Country: '.$SparePart->getpartCountry() .'</h5>
						<h5 class="card-title text-center text-secondary" name="quantity">PartQuantity:'.$SparePart->getpartQuantity() .'</h5>
						<h5 class="card-title text-center text-warning" name="hidden_price">PartPrice:'.$SparePart->getpartPrice() .' LE</h5>

					   </div>';
					   if($_SESSION["Role"]==='Manger' )
					{
                $str.="
					   <button type='submit'class='btn btn-warning btn-block' name='Edit' id='Edit'
					    onclick=\"location.href='SparePart.php?action=edit&id=".$SparePart->getPartNumber()."'\">Edit</button>
			
					<button type='submit' class='btn btn-warning btn-block' name='Delete' id='Delete'
					 onclick=\"location.href='SparePart.php?action=delete&id=".$SparePart->getPartNumber()."'\">Delete </button>
				   ";
					}
                $str.=' <form action="Transactions.php?action=Import&id='.$SparePart->getPartNumber().'" method="post">
		  			 <div class="card-footer p-1">
		  			 	
						<input type="text"  name="Qty" value="1"><br><br>
						<button type="submit"  class="btn btn-warning btn-block" name="Import" id="Import" >Import</button><br>
					</form>';
					
					$str.='<form action="Cart.php?action=cart&partNumber='.$SparePart->getPartNumber().'" method="post">
					 <input type="text" id="Qty" name="Qty" value="1"><br><br>
						<button type="submit"  class="btn btn-warning btn-block" name="cart" id="cart"><i class ="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to Cart</button><br>
						</form>
		  			 </div>
		  			 
					   </div>
					  
		  			</div>
		  		   </div>';
            }
            $str.=' </div>
		</div>';
    
        

        
            return $str;
        
    }

        public function addSparePart()
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

<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Add new Parts</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      

<form action="SparePart.php?action=addAction&id='.$_GET['CarID'].'" method="post">
<div class="row">
	<div class="col-lg-12">
		<input type="text" class="form-control" name="PartNumber"  placeholder="Enter Part Number"/>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<input type="text" class="form-control" name="PartName"  placeholder="Enter Part Name"/>
	</div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
		<input type="text" class="form-control" name="partCountry"   placeholder="Enter part country"/>
	</div>
</div>
<br>
<div class="row">
        <div class="col-lg-12">
		<input type="text" class="form-control" name="partPrice" placeholder="Enter Price"/>
	</div>
</div>
<br>
<div class="row">
        <div class="col-lg-12">
		<input type="text" class="form-control" name="partQuantity" placeholder="Enter Quantity"/>
	</div>
</div>
<br>
<div class="form-group">
			<div>
				<input type="file" class="form-control" required="required" name="imgName"  id="imgName" placeholder="Imge Name"/>
			</div>
		</div>
		<br>
<br>
<div class="portfolio-caption">
           <div class="btn-group btn-group-lg">
		<button type="submit" class="btn btn-warning" name="Add" id="Add">Add</button>
	</div>
</div>
</form>
</div>
</setion>';
    return $str;
        }


       public function viewEditSparePart($id)
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

<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> Companys</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">';
    $str.="<table class='section-heading text-uppercase' id='items'>";
			$str.="<tr>
					<th>Part Name</th>
					<th>Car Name</th>
					<th>Part Country</th>
					<th>Part price</th>
				</tr>";
        
            
            $str.="<tr>";
            $str.="<form 
				action='SparePart.php?action=editAction&id=".$this->model->getPartNumber() ."' method='post'>";
            $str.="<td><input type='text' name='PartName' value='".$this->model->getPartName() ."'>  </td> ";
            $str.="<td><input type='text' name='partCountry' value='".$this->model->getpartCountry() ."'></td> ";
                
            $str.="<td><input type='text' name='partPrice' value='".$this->model->getpartPrice() ."'>  </td> ";
            //$str.="<td><input type='text' name='partQuantity' value='".$SparePart->getpartQuantity() ."'></td> ";
                

            $str.="<td><input type='submit' value='Change'/></td>";
            $str.="</form>";
            $str.="</tr>";
            
            
        
            return $str;
        }
    }
