<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="mysql";

$mvisit_name= $_POST['name'];
$mvisit_email=$_POST['email'];
$mvisit_timestamp=date('Y-m-d H:i:s');

echo  $mvisit_name;
echo  $mvisit_email;
echo  $mvisit_timestamp; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO myvisitors(myvisit_name,myvisit_email,myvisit_timestamp) VALUES('".$mvisit_name."','".$mvisit_email."','".$mvisit_timestamp."')";

if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
	} 
	else {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


mysqli_close($conn);
header("location: ../././index.html");
?>