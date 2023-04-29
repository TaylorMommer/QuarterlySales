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
	 $sql = "select * from requests LIMIT 3";
		$result = ($conn->query($sql));
		//declare array to store the data of database
		$row = []; 
	  
		if ($result->num_rows > 0) 
		{
			// fetch all data from db into array 
			$row = $result->fetch_all(MYSQLI_ASSOC);  
		}   
		
?>
   

<div class="areas">
  <h2>$COMMUNITY NAME</h2>
  <h5>Community Size: $COMMUNITY_SIZE</h5>
  <div class="drImg" style="height:250px;">$COMMUNITY_AREA - $ZIPCODE</div>
  <p>Volunteers needed:</p>
  <a href="volunteer.php">View more requests</a>

 

<!--Urgent Requests-->
      <h2>Urgent Requests</h2>
	  <?php(!empty($row))
		foreach($row as $rows)
		?>
      <div class="img">
      <table>
        <thead>
            <tr>Date:</tr>
        </thead>
        <tbody>
            <?php
               if(!empty($row))
               foreach($row as $rows)
              { 
            ?>
            <tr>
		
		<div class="img">
                <strong><?php echo $rows['date']; ?></strong> <br> <?php echo $rows['service']; ?> <br><?php echo $rows['title']; ?> <br> <?php echo $rows['description']; ?></td>
		
            </tr>
            <?php } ?>
			</tbody>
		</table>
		</div>
		  <div class="img"><p></p></div>
		  <div class="img"><p></p></div>
		  <div class="img"><a href="volunteer.php">View All Requests</a></div>
    </div>

