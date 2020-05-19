<!DOCTYPE html>
	<html lang="en">
	
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
	<!-- Plugin JavaScript -->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
	<!-- Contact form JavaScript -->
	<script src="js/jqBootstrapValidation.js"></script>
	<script src="js/contact_me.js"></script>
	<script src="js/portfolio.js"></script>

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

				<a class="nav-link js-scroll-trigger" href="Car.php">Car</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php">Employee </a>
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