<?php 


include('app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password</title>

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
          <h2 class="section-heading text-uppercase"> Reset Password</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
		<form action="resetpass.php" method="post">
		
       
		<div class="row">
              <div class="col-md-6">
				<input type="email" class="form-control" name="email" required="required" placeholder="Enter Your Email"/>
			</div>
		</div>
		<br>

		<div class="portfolio-caption">
           <div class="col-lg-12 text-center">
           <div class="btn-group btn-group-lg">
				<input type="submit"class="btn btn-warning" class="btn btn-primary btn-xl text-uppercase" name="reset" value="Send Mail"/>
			</div>
		</div>
		</div>
	
		</form>
		</div>
  </section>
</body>
</html>