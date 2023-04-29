<?php 
session_start();
//redirect to index if user not logged in.
if (!isset($_SESSION['logged_in_id']))
{
header("location: index.php");
exit;
}
else
{
//Set variables for use throughout our app
$sessionId = $_SESSION['logged_in_id'];
$sessionFname = $_SESSION['logged_in_fname'];
$sessionLname = $_SESSION['logged_in_lname'];
$sessionEmail = $_SESSION['logged_in_email'];
$sessionPhone = $_SESSION['logged_in_phone'];
$sessionStreetAddress = $_SESSION['logged_in_streetAddress'];
$sessionZip = $_SESSION['logged_in_zip'];
}
?>