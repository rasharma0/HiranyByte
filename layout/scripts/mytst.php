<?php
require_once "PHPMailer-5.2.25/Mail.php";

$from = "Aditi Ram Sharma <aditi.ram.sharma@gmail.com>";
$to = "Ram A Sharma <r_a_sharma@yahoo.com>";
$subject = "Hi Ramu!!!!!";
$body = "Hi,\n\nHow are you Rammmu?";

$host = "smtp.gmail.com";
$port = "587";
$username = "aditi.ram.sharma@gmail.com";
$password = "shrinathji7Z!";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>
