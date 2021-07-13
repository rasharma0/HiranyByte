<?php


include('session.php');

if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>