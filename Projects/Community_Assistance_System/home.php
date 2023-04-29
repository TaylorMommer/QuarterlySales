<?php 
include_once('LoggedInToSession.php');
 $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "community_assistance";
     
 // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
	 $sql = "select * from requests";
		$result = ($conn->query($sql));
		//declare array to store the data of database
		$row = []; 
	  
		if ($result->num_rows > 0) 
		{
			// fetch all data from db into array 
			$row = $result->fetch_all(MYSQLI_ASSOC);  
		}   
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8" />
	<link href= "CSS/community_assistance.css" rel="stylesheet" />
	<link href= "CSS/CA_Base.css" rel="stylesheet" />
    <title>Community Assistance South Dakota</title>
</head>


<body>
	<div class="header">
  <?php 
include_once('header.php');
?>
	</div>
<div class="topnav">
<?php 
include_once('topnav.php');
?>
</div>

<!-----------------------Left Column(Content)---------------------------->
<div class="row">
  <div class="leftcolumn">
    <div class="areas">
      <h2>$COMMUNITY NAME</h2>
      <h5>Community Size: $COMMUNITY_SIZE</h5>
      <div class="drImg" style="height:250px;">$COMMUNITY_AREA - $ZIPCODE</div>
      <p>Volunteers needed:</p>
      <a href="volunteer.php">View more requests</a>

    </div>

    <button id="btn_communities">Join More Communities</button>
  </div>
  
<!----------------------------------------------------------------------->


<!---------------------Right Column(Info Bar)---------------------------->
  <div class="rightcolumn">
  <?php
    include_once('sidebar.php');
    ?>
  </div>
</div>
<!----------------------------------------------------------------------->



<div class="footer">
<?php
  include('footer.php');
  ?>
</div>

</body>
</html>
