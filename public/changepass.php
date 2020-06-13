<?php 
// define('__ROOT__', "../app/");
// require_once(__ROOT__ . "model/sendmail.php");
// require_once(__ROOT__ . "controller/ResetController.php");

// $model = new reset();
// $controller = new ResetController($model);

include('app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> Reset Password</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
        <form action="changepass.php" method="post">
        
       
        <div class="row">
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" required="required" placeholder="Enter New Password" id="pass"/>
            </div>
        </div>
        <br>






        <div class="row">
              <div class="col-md-6">
                <input type="password" class="form-control" name="confirmpassword" required="required" placeholder="Confirm Password" id="confirmpass"/>
            </div>
        </div>
        <br>
           <script>
                var pass = document.getElementById("pass"); 
                var confirmpass = document.getElementById("confirmpass");
                function validatePassword2()
                {
                    if(pass.value != confirmpass.value) 
                    {
                        confirmpass.setCustomValidity("Passwords Doesn't Match");
                    } 
                    else
                    {
                        confirmpass.setCustomValidity('');
                    }
                }
                pass.onchange = validatePassword2;
                confirmpass.onkeyup = validatePassword2;
              </script>



        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" name="code" required="required" placeholder="Enter Code that in the mail "/>
            </div>
        </div>
        <br>

        <div class="portfolio-caption">
           <div class="col-lg-12 text-center">
           <div class="btn-group btn-group-lg">
                <input type="submit"class="btn btn-warning" class="btn btn-primary btn-xl text-uppercase" name="new_password" value="Submit"/>
            </div>
        </div>
        </div>
        </form>
        </div>
</body>
</html>
