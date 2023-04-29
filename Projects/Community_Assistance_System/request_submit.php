<?php
$postID = htmlspecialchars(trim($_POST["customer_id"]));
$postTitle = htmlspecialchars(trim($_POST["title"]));
$postDescription = htmlspecialchars(trim($_POST["descriptiontext"]));
$postDate = htmlspecialchars(trim($_POST["date"]));
$postService = htmlspecialchars(trim($_POST["service"]));
$postStatus = htmlspecialchars(trim($_POST["status"]));

$error_count = 0;

if ($error_count == 0){
        include_once('config.php');

		$sql = "INSERT INTO `requests`(`date`, `service`, `status`, `userid`, `title`, `description`) VALUES ('$postDate','$postService','$postStatus','$postID','$postTitle','$postDescription')";


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

			    header("Location: my_profile.php?m=You%20Have%20Posted%20Your%20Request%20Successfully.");
			exit;
			}
				
			


		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}

	}
?>