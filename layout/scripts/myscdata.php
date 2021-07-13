<?php 

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Etc/UTC');

//Load Composer's autoloader
require '../../vendor/autoload.php';



$servername="localhost";
$username="admin";
$password="ras9594Z";
$dbname="myxpressions";
$m_emailcc="ram@xpressionsunlimited.com";

$m_name			= 	ucwords($_POST['name']);
$m_email		=	$_POST['email'];
$m_subject		= 	$_POST['sbjct'];
$m_message		=	$_POST['message'];
$m_subscriber	=	$_POST['subscriber'];
$m_timestamp	=	date('Y-m-d H:i:s');


echo  $m_name;
echo  $m_email;
echo  $m_subject;
echo  $m_message;
echo  $m_timestamp;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO mysitecontacts(mysc_name,mysc_emailto,mysc_emailcc,mysc_subject,mysc_message,mysc_subscriber,mysc_timestamp) VALUES('".$m_name."','".$m_email."','".$m_emailcc."','".$m_subject."','".$m_message."','".$m_subscriber."','".$m_timestamp."')";

if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		header("location: ../../index.html");
	} 
	else {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		header("location: mycontact.html");
	}


mysqli_close($conn);



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'xpressionsunlimited0@gmail.com';                 // SMTP username
    $mail->Password = 'ras9594ZZx';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom( $m_email , $m_name );
    $mail->addAddress('ram@xpressionsunlimited.com', 'XpressionsUnlimited.com');     // Add a recipient
    // $mail->addAddress('ram@xpressionsunlimited.com');               // Name is optional
    $mail->addReplyTo($m_email, $m_name);
    $mail->addCC($m_email);
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $m_subject;
    $mail->Body    = $m_message;
    $mail->AltBody = 'non-HTML mail clients'.$m_message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location: ../../index.html");

?>
