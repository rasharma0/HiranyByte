<?php 
$servername="localhost";
$username="admin";
$password="ras9594Z";
$dbname="myxpressions";

$mf_fname		= 	ucwords($_POST['ffname']);
$mf_email		=	$_POST['femail'];
$mf_fpassword	= 	$_POST['ffpassword'];
$mf_timestamp	=	date('Y-m-d H:i:s');

$mf_mname		=	ucwords($_POST['fmname']);
$mf_lname		=	ucwords($_POST['flname']);
$mf_spassword	=	$_POST['fspassword'];




echo  $mf_fname;
echo  $mf_email;
echo  $mf_fpassword;
echo  $mf_spassword;
echo  $mf_timestamp;

if ($mf_fpassword != $mf_spassword){
	die("Password Mismacth !!., Please try again.");
}
 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO mysubscribers(mysub_fname,mysub_mname,mysub_lname,mysub_email,mysub_password,mysub_timestamp) VALUES('".$mf_fname."','".$mf_mname."','".$mf_lname."','".$mf_email."','".$mf_fpassword."','".$mf_timestamp."')";

if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		header("location: ../../index.html");
	} 
	else {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		header("location: mysignup.html");
	}


mysqli_close($conn);

//RAS_CODE Sending EMail

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require '../../PHPMailer-5.2.25/PHPMailerAutoload.php';


//Create a new PHPMailer instance
$mail = new PHPMailer;


//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;


//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';


//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';



// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;



//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';


//Whether to use SMTP authentication
$mail->SMTPAuth = true;


//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "rasharma0@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "ras9594ZZx";
//Set who the message is to be sent from


$mail->setFrom('ram@xpressionsunlimited.com', 'Ram Sharma');
//Set an alternative reply-to address
$mail->addReplyTo('ram@xpressionsunlimited.com', 'Ram Sharma');



//Set who the message is to be sent to
$mail->addAddress($mf_email, $mf_fname);
//Set the subject line
$mail->Subject = 'Welcome to XpressionsUnlimited.com Doamin your eMail '.$mf_email.' is registered with us.!' ;


//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('../../pages/mymailer.html'), dirname(__FILE__));


//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


//Attach an image file
$mail->addAttachment('../../images/mybannerlogoonleftwithpicY.png');



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}



//End of RAS_CODE Email




header("location: ../../index.html");

?>
