<?php
include_once('config.php');
   
   $loginError = '';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = htmlspecialchars(trim($_POST['loginemail']));
    $userPassword = htmlspecialchars(trim($_POST['loginpassword']));
    $error_count = 0;

    if(empty($email)) {
        $loginError .='<br><p class="error">Please Enter your email.</p>';
        $error_count++;
    }
    if(empty($password)) {
        $loginError .='<br><p class="error">Please Enter your password.</p>';
        $error_count++;
    }
    

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
     $sql = "SELECT *
     FROM customers
     WHERE email LIKE '$email'";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
            $returnPassword = $row["password"];

            if ($userPassword == $returnPassword)
            {
                session_start();
                $_SESSION['logged_in_id'] = $row["id"];;
                $_SESSION['logged_in_fname'] = $row["fname"];
                $_SESSION['logged_in_lname'] = $row["lname"];
                $_SESSION['logged_in_email'] = $row["email"];
                $_SESSION['logged_in_streetAddress'] = $row["streetAddress"];
                $_SESSION['logged_in_zip'] = $row["zip"];
                $_SESSION['logged_in_phone'] = $row["phone"];

                header("Location: home.php");
			exit;
            }
            else
            {
                $loginError = '<p class="error">The Username or Password you entered is incorrect.</p>';
            }


            
            
         }
         }
         }
    }
    ?>