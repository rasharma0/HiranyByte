<?php
date_default_timezone_set('America/Toronto');

require_once('PHPMailer-5.2.25/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "gdssdh";
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "aditi.ram.sharma@gmail.com";  // GMAIL username
$mail->Password   = "shrinathji7Z!";            // GMAIL password

$mail->SetFrom('r_a_sharma@yahoo.com', 'PRSPS');

//$mail->AddReplyTo("user2@gmail.com', 'First Last");

$mail->Subject    = "PRSPS PAGAL-PAGAL password";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "r_a_sharma@yahoo.com";
$mail->AddAddress($address, "user2");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>
