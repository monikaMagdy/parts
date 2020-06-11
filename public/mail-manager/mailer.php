<?php
require 'PhpMailer/PHPMailerAutoload.php';

function sendCMail($userEmail, $msg){

	//Email Data
	$emailSubject = "Password Recovery";
	$emailBody = $msg;

	//Admin Data
	$senderHost = "smtp.hostinger.com";
	$senderName = "Auto Spare Parts";
	$senderEmail = "admin@auto-spareparts.cf";
	$senderPassword = "SasaSasa123";

	//Sending using PHPMailer
	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = $senderHost;                            // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $senderEmail;                       // SMTP username
	$mail->Password = $senderPassword;                    // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	$mail->From = $senderEmail;  
	$mail->FromName = $senderName;
	$mail->addAddress($userEmail);                        // Add a recipient
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	$mail->Port = 587;
	//$mail->isHTML(true);                                // Set email format to HTML

	$mail->Subject = $emailSubject;
	$mail->Body    = $emailBody;

	if(!$mail->send()) {
	    return false;
	} else {
	    return true;
	}
}
?>