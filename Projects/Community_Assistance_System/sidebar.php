<?php 
include_once('LoggedInToSession.php');
 $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "community_assistance";
   $urMessage = "";
     
 // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
	 $sql = "select * from requests JOIN customers ON customers.id = requests.userid WHERE `status` LIKE 'Urgent' && date >= CURRENT_DATE() && claimed='No' ORDER BY date LIMIT 3;";
		$result = ($conn->query($sql));
		//declare array to store the data of database
		$row = []; 
	  
		if ($result->num_rows > 0) 
		{
			// fetch all data from db into array 
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}   
    else
    {
      $urMessage = "<p> No Urgent Requests</p>";  
    }
		
		
/*   volunteer work */

 // connect the database with the server
		$sql = "SELECT *, volunteers_requests.userid AS 'volunteerID', customers.id AS 'requestorID'
    FROM volunteers_requests
    JOIN requests ON requests.request_id = volunteers_requests.requestid
    JOIN customers ON requests.userid = customers.id";		
		$vresult = ($conn->query($sql));
		//declare array to store the data of database
		$vol = []; 
	  
		if ($vresult->num_rows > 0) 
		{
			// fetch all data from db into array 
			$vol = $vresult->fetch_all(MYSQLI_ASSOC);  
		}

?> 


<!--Urgent Requests-->
<div class="card">
      <h2>Urgent Requests</h2>
	  <?php(!empty($row))
		foreach($row as $rows)
		?>
      <div class="img">
      <table>
        <!--<thead>
            <tr>Date:</tr>
        </thead>-->
        <tbody>
            <?php
               if(!empty($row))
               foreach($row as $rows)
              { 
            ?>
            <tr>
		
		<div class="img">
                <b><a href="user.php?u=<?php echo $rows['id'];?>" style="color: lightblue; text-decoration: none;"><?php echo $rows['fname'] . " " . $rows['lname']?></a></b><br>
                <strong><?php echo $rows['date']; ?></strong> <br> <?php echo $rows['service']; ?> <br><?php echo $rows['title']; ?> <br> <?php echo $rows['description']; ?></td>
                
            
            <?php } ?>
            <?php echo $urMessage ?>
            </tr>
			</tbody>
		</table>
		</div>
		  <div class="img"><p></p></div>
		  <div class="img"><p></p></div>
		  <div class="img"><a href="volunteer.php?c=%">View All Requests</a></div>
    </div>

    <!--Volunteer Work-->
    <div class="card">
      <h2>My Volunteer Work</h2>
	  
      <table>
            <?php
               if(!empty($vol))
               foreach($vol as $vols)
              { 
            ?>
            <tr>
		<div class="img">
                <b><a href="user.php?u=<?php echo $vols['id'];?>" style="color: lightblue; text-decoration: none;"><?php echo $vols['fname'] . " " . $vols['lname']?></a></b><br>
                <strong><?php echo $vols['date']; ?></strong> <br> <?php echo $vols['service']; ?> <br><?php echo $vols['title']; ?> <br> <?php echo $vols['description']; ?></td>
	  </div>
            </tr>
            <?php } ?>
        </tbody>
      <div class="img"><a href="my_profile.php">View My User Profile</a></div>
    </div>

    <!--Connect-->
    <div class="card">
      <h2>Connect</h2>
      <div style="display: flex; justify-content: center;">
      <a href="javascript:void(0)"><img src="Images\facebookicon.png" id="facebookIcon" onmouseover="facebook_onHover()" onmouseout="facebook_offHover()"></a>
      <a href="javascript:void(0)"><img src="Images\instaicon.png" id="instaIcon" onmouseover="instagram_onHover()" onmouseout="instagram_offHover()"></a>
      <a href="javascript:void(0)"><img src="Images\twittericon.png" id="twitterIcon"  onmouseover="twitter_onHover()" onmouseout="twitter_offHover()"></a>
      <div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="Scripts\imageswap.js"></script>