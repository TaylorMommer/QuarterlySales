<?php 
include_once('config.php');

//Variables
$error_count = 0;

$error_fname = "";
$error_lname = "";
$error_password = "";
$error_email = "";
$error_phone = "";
$error_streetaddress = "";
$error_zip = "";


if(isset($_POST['submit'])){
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$userpassword = ($_POST['password']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);
	$streetAddress = ($_POST['streetAddress']);
	$zip = ($_POST['zip']);
	/*
	//Error checking the registration form
	//Fname
	//Length
	if (strlen($fname) > 50) {
		$error_fname .= "Your first name can not be greater than 50 characters.";
		$error_count++;
	}

	//Lname
	//Length
	if (strlen($lname) > 50) {
		$error_lname .= "Your last name can not be greater than 50 characters.";
		$error_count++;
	}

	//Password
	//Length
	if (strlen($userpassword) > 255) {
		$error_password .= "Your password can not be greater than 255 characters.";
		$error_count++;
	}
	if (strlen($userpassword) < 8) {
		$error_password .= "Your password must be atleast 8 characters long.";
		$error_count++;
	}

	//Email
	//Length
	if (strlen($email) > 100) {
		$error_email .= "Your email can not be greater than 100 characters.";
		$error_count++;
	}
	//Duplicate

	//Phone

	//StreetAddress
	//Length
	if (strlen($streetAddress) > 100) {
		$error_streetaddress .= "Your street address can not be greater than 100 characters.";
		$error_count++;
	}

	//Zip
	//Length
	if (strlen($zip) > 255) {
		$error_zip .= "Your Zipcode can not be greater than 5 characters.";
		$error_count++;
	}*/


	if ($error_count == 0){
		$sql = "INSERT INTO `customers`(`fname`, `lname`, `password`, `email`, `phone`, `streetAddress`,`zip`) VALUES ('$fname','$lname','$userpassword','$email','$phone','$streetAddress','$zip')";


		if(mysqli_query($conn,$sql)){
			//Get info from the new account for logging in
			//Attempt to connect to the database
			$db = mysqli_connect($servername,$username,$password,$dbname);

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
			}
			else
			{
	   
			//SQL Querry to Database
			$sql2 = "SELECT id, fname, lname, email, phone, streetAddress, zip
			FROM customers
			where email = '$email'";
	   
			if(!$result = $db->query($sql2)){
				echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
			}  
			else {
				//Set up session to login user after they register.
				session_start();
	   
				$row = $result->fetch_assoc();
	   
				 $_SESSION['logged_in_id'] = $row["id"];;
				 $_SESSION['logged_in_fname'] = $row["fname"];
				 $_SESSION['logged_in_lname'] = $row["lname"];
				 $_SESSION['logged_in_email'] = $row["email"];
				 $_SESSION['logged_in_streetAddress'] = $row["streetAddress"];
				 $_SESSION['logged_in_zip'] = $row["zip"];
				 $_SESSION['logged_in_phone'] = $row["phone"];

				}
				}
				
			//Once registration is complete, goto the confirmation page.
			echo "Registration Sucessful!";
			header("Location: registration_successful.php");
			exit;


		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}

	}
	
	mysqli_close($conn);
}


?>


