<?php


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
		
$str.='
		<div class="container">
		 <div class="row mt-2 pb-3">';
		  foreach ($this->model->getSpareParts() as $SparePart) 
		  {
		  	$str.='<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
		  			<div class="card-deck">
		  			 <div class="card p-2 border-seconadry mb-2">
		  			 <img src="img/'.$SparePart->getimage() .' "class="card-img-top" hight="250"/><br><br><hr>
		  			 <div class="card-body p-1">
		  			 
		  			 	<h5 class="card-title text-center text-info" name="partName">PartName: '.$SparePart->getPartName() .'</h5>
						<h5 class="card-title text-center text-info" name="partNumber">PartNumber: '.$SparePart->getPartNumber() .'</h5>
						
						<h5 class="card-title text-center text-info" name="partCountry">Country: '.$SparePart->getpartCountry() .'</h5>
						<h5 class="card-title text-center text-info" name="quantity">PartQuantity:'.$SparePart->getpartQuantity() .'</h5>
						<h5 class="card-title text-center text-danger" name="hidden_price">PartPrice:'.$SparePart->getpartPrice() .' LE</h5>

		  			 </div>
		  			 <form action="Transactions.php?action=Import='.$SparePart->getPartNumber().'" method="post">
		  			 <div class="card-footer p-1">
		  			 	
						<input type="text"  name="Qty" value="1"><br><br>
						<button type="submit"  class="btn btn-info btn-block" name="Import" id="Import" >Import</button><br>
					</form>

					<form action="Transactions.php?action=cart&id='.$SparePart->getPartNumber().'" method="post">
					 <input type="hidden" id="hidden_PartNumber" name="hidden_PartNumber"'.$SparePart->getPartNumber() .'>
					 <input type="hidden" id="hidden_partName" name="hidden_partName"'.$SparePart->getPartName() .'>
					
					 <input type="hidden" name="hidden_PartPrice"'.$SparePart->getpartPrice() .' >
					 <input type="text" id="Qty" name="Qty" value="1"><br><br>
						<button type="submit"  class="btn btn-info btn-block" name="cart" id="cart" ><i class ="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to Cart</button><br>
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

	function addSparePart()
	{
		$str='<!DOCTYPE html>
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

<form action="SparePart.php?action=addAction&id='.$_GET['CarID'].'" method="post">

	<h2>Add Spare Parts</h2>
		<p class="hint-text">Spare Parts Infromation</p>

		<div class="form-group">
		<div><input type="text" class="form-control" name="PartNumber"  placeholder="Enter Part Number"/>
		</div>
		</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="PartName"  placeholder="Enter Part Name"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="carName" placeholder="Enter Car Name"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" name="partCountry"   placeholder="Enter part country"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" name="partPrice" placeholder="Enter Price"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" name="partQuantity" placeholder="Enter Quantity"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" name="image" placeholder="Enter Image Name"/>
			</div>
		</div>
		<br>

		<div class="form-group">
			<div class="form-group">
				<button type="submit" class="btn btn-warning" name="Add" id="Add">Add</button>
        	</div>
        </div>
		</form>';
		return $str;
	}


	public function viewEditSparePart($id)
	{
		$str = "";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Model</th><th>Year</th><th>Action</th></tr>";
		$SparePart=$this->model->getSparePart($id);
				$str.="<tr>";
				$str.="<form 
				action='SparePart.php?action=editAction&id=".$SparePart->getPartNumber() ."' method='post'>";
				$str.="<td><input type='text' name='PartName' value='".$SparePart->getPartName() ."'>  </td> ";
				$str.="<td><input type='text' name='partCountry' value='".$SparePart->getpartCountry() ."'></td> ";
				$str.="<td><input type='text' name='carName' value='".$SparePart->getcarName() ."'></td> ";
				$str.="<td><input type='text' name='partPrice' value='".$SparePart->getpartPrice() ."'>  </td> ";
				$str.="<td><input type='text' name='partQuantity' value='".$SparePart->getpartQuantity() ."'></td> ";
				

				$str.="<td><input type='submit' value='Change'/></td>";
				$str.="</form>";
				$str.="</tr>";
			
		return $str;
	}
}