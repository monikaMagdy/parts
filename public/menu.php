<!DOCTYPE html>
	<html lang="en">
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	</head>
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
	<!-- Plugin JavaScript -->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
	<!-- Contact form JavaScript -->
	<script src="js/jqBootstrapValidation.js"></script>
	<script src="js/contact_me.js"></script>
	<script src="js/portfolio.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<body id="page-top">
	<!-- Navigation -->
	  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="
		background: #000;">
	
		<div class="container">
		  <a class="navbar-brand js-scroll-trigger" href="welcome.php">Start Work</a>
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarResponsive">

		  					
		  <?php
		   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
					if($_SESSION["Role"]==='Manger' )
					{

		  				echo'
			<ul class="navbar-nav text-uppercase ml-auto">
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger"  href="Car.php"><i class="fas fa-car"></i>&nbsp;&nbsp;</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link js-scroll-trigger" href="searchFrontend.php"><i class="fas fa-search"></i>&nbsp;&nbsp;</a>
			</li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php"><i class="fas fa-male"></i>&nbsp;&nbsp;</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="cart.php"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="exportIndex.php">Check Out</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="Addcompany.php">Add Company</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="signout.php">Log Out</a>
			  </li>	
				
			</ul>
		  </div>
		</div>
	  </nav>
	   ';
	}
	else 
	{
		echo'
			<ul class="navbar-nav text-uppercase ml-auto">
			  <li class="nav-item">

				<a class="nav-link js-scroll-trigger" href="Car.php">Car</a>
			  </li>
			 
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="Export.php">Check Out</a>
			  </li>
			  
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="Addcompany.php">Add Company</a>
			  </li>

 			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="signout.php">Log Out</a>
			  </li>	
			  </ul>
		  </div>
		</div>
	  </nav>
	   ';
	
}
	   ?>
	  </body>

	 </html>