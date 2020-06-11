<?php 
include('app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Send Mail Message</title> 	
</head>
<body>

	<form class="" action="login.php" method="post" style="text-align: center;">
	    <h1>Open Your Mail :-</h1>
		<h3> An email sent with a link of password reset to <h3><?php echo $_GET['email'] ?></b> to reset your password.</p>
	</form>
</body>
</html>