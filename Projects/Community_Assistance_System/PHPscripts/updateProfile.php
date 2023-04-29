<?php
include_once('config.php');
$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitProfile'])) {
    $error = "";
    $Success = "";
    $error_count = 0;

    //Get data from form
    $updateAddress = htmlspecialchars(trim($_POST['address']));
    $updateZip = htmlspecialchars(trim($_POST['zip']));
    $updatePhone = htmlspecialchars(trim($_POST['phone']));
    $updater = htmlspecialchars(trim($_POST['myID']));

    //Error Checking
    if (empty($updateAddress) || empty($updatePhone) || empty($updateZip)) {
        $error = "<p style=\"color: red;\">Please fill out all fields.</p>";
        $error_count++;
    }
    if (strlen($updateZip) > 5)
    {
        $error = "<p style=\"color: red;\">Zip code can not be longer than 5 digits.</p>";
        $error_count++;
    }
    if (is_nan($updateZip))
    {
        $error = "<p style=\"color: red;\">Zip code can only contain numbers.</p>";
        $error_count++;
    }
    if (strlen($updateAddress) > 100)
    {
        $error = "<p style=\"color: red;\">Address can not be longer than 100 digits. $testlength</p>";
        $error_count++;
    }
    if (strlen($updateAddress) > 25)
    {
        $error = "<p style=\"color: red;\">Phone number can not be longer than 25 digits. $testlength</p>";
        $error_count++;
    }
    //Update Profile
    if ($error_count == 0)
    {
        //Attempt to connect to the database
     $db = mysqli_connect($servername,$username,$password,$dbname);

     // Check connection
     if (mysqli_connect_errno())
     {
         echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
     }
     else
     {
    
    //update customers table
     //SQL Querry to Database
     $sql = "UPDATE `customers` SET `phone`='$updatePhone',`streetAddress`='$updateAddress',`zip`='$updateZip' WHERE id = $updater";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p><br><p>$sql</p>";
     }  
     else {
        $_SESSION['logged_in_streetAddress'] = $updateAddress;
        $_SESSION['logged_in_zip'] = $updateZip;
        $_SESSION['logged_in_phone'] = $updatePhone;
        $success = "<h3 style=\"color:green;\">Your information has been updated!</h3>";
                }
            }

        }
    }

?>