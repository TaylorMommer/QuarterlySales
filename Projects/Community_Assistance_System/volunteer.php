<?php 
  $category=$_GET['c'];
  include_once('LoggedInToSession.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8" />
	<link href= "CSS/community_assistance.css" rel="stylesheet" />
	<link href= "CSS/CA_Base.css" rel="stylesheet" />
  <link href= "CSS/forms.css" rel="stylesheet" />
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
    <!--Search Function-->
    <form action="PHPscripts\categoryChange.php" method="POST">
      <Label>Category</Label>
      <select onchange="this.form.submit()" id="cat" name="cat">
        <option value="<?php echo $category?>" selected disabled hidden><?php if ($category == "%") {echo "All";} else {echo $category;}?></option>
        <option value="All">All</option>
        <option value="Grocery">Grocery</option>
        <option value="Yardwork">Yardwork</option>
        <option value="Care">Care</option>
        <option value="Home Maintenance">Home Maintenance</option>
        <option value="Cleaning">Cleaning</option>
        <option value="Disaster Relief">Disaster Relief</option>
        <option value="Ride Share">Ride Share</option>
        <option value="Other">Other</option>
      </select>
    </form>

    <!--Request cards generated for each request. Automatically sorts by Date.-->
    <?php
    include_once('config.php');

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
     $sql = "SELECT date, service, request_id, userid, title, description, status, fname, lname, claimed
     FROM requests
     INNER JOIN customers ON requests.userid=customers.id
     where service LIKE '$category' && date >= CURRENT_DATE() && claimed='No'
     ORDER BY date, status DESC";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
          $requestid = $row["request_id"];
          $userid = $row["userid"];
          $title = $row["title"];
          $service = $row["service"];
          $date = $row["date"];
          $description = $row["description"];
          $requesting_username = $row["fname"] . " " . $row["lname"];
          $priority = $row["status"];

          $sessionID = $_SESSION['logged_in_id'];

          echo "<div class=\"requestCard\">
                <h2>$title</h2>
                <b><a href=\"user.php?u=$userid\" style=\"color: #0099ff; text-decoration: none;\">$requesting_username</a></b>
                <h5>Service: $service</h5>
                <p>Description: $description</p>
                <p>Date Needed: $date | Priority: $priority</p>
                <form action=\"PHPscripts\setVolunteer.php\" method=\"POST\">
                <input type=\"hidden\" id=\"sessionID\" name=\"sessionID\" value=\"$sessionID\"></input>
                <input type=\"hidden\" id=\"requestID\" name=\"requestID\" value=\"$requestid\"></input>
                <button type=\"submit\">Volunteer</button>
                </form>
                </div>";         
         }
         }
         }
    ?>
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
