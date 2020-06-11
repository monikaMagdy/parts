<?php 

session_start();
$errors = [];
$user_id = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'autosparecar');

if (isset($_POST['reset'])) 
{
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM user WHERE email='$email'";
  $results = mysqli_query($db, $query);

  $code = bin2hex(random_bytes(5));
  //$code = rand(0,25);
  if (count($errors) == 0)
  {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO rpassword(email, code) VALUES ('$email', '$code')";
    $results = mysqli_query($db, $sql);

    $to = $email;
    $subject = "Password Change";
    $msg = "Hello your password code is ". $code." and the page of reset password is http://localhost/parts-master/public/changepass.php";
    $headers = "From: support@gmail.com";
    mail($to, $subject, $msg, $headers);
    header("Location: message.php?email=" . $email);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) 
{
  $password = $_POST['password'];

  // Grab to token that came from the email link
  $code = $_POST['code'];
  if (count($errors) == 0)
   {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM rpassword WHERE code='$code' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email)
    {
      $password=hash('sha512',$password); 
      //$new_pass = md5($new_pass);
      $sql = "UPDATE user SET password='$password' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: Login.php');
    }
  }
}
?>
