<?php
$userID = $_POST['sessionID'];
$requestID = $_POST['requestID'];

include_once('../config.php');

     //Attempt to connect to the database
     $db = mysqli_connect($servername,$username,$password,$dbname);

     // Check connection
     if (mysqli_connect_errno())
     {
         echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
     }
     else
     {
    
    //Input user information into volunteers-requests table
     //SQL Querry to Database
     $sql = "INSERT INTO `volunteers_requests`(`userid`, `requestid`) VALUES ('$userID','$requestID')";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

            //Set claimed to yes
            $sql = "UPDATE `requests` SET `claimed`='Yes' WHERE request_id LIKE $requestID";

            if(!$result = $db->query($sql)){
                echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
            }  
            else {
                header("Location: ../my_profile.php?m=Thanks%20For%20Volunteering!%20Please%20Reach%20Out%20To%20The%20Requestor%20Soon!");
                exit;
                }
            }

        }


?>