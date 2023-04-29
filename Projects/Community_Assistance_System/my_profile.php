<?php
 include_once('LoggedInToSession.php');
$user = $_SESSION['logged_in_id'];

if (isset($_GET['m']))
{
$message=$_GET['m'];
}
else
{
  $message = "";
}
//Retrieve Users information
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
     $sql = "SELECT id, fname, lname, email, phone, zip
     FROM customers
     where id LIKE '$user'";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
          $user_username = $row["fname"] . " " . $row["lname"];
          $user_email = $row["email"];
          $user_phone = $row["phone"];
          $user_zip = $row["zip"];     
         }
         }
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
  <h3 style="color: green;"><?php echo $message?></p>
    <h2><?php echo $user_username?></h2>
    <p><?php echo "Location: " . $user_zip?></p>

    <h2>My Requests</h2>
    <!--Request cards generated for users requests. Automatically sorts by Date.-->
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
     where userid LIKE '$user' && date >= CURRENT_DATE()
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
              <b><a href=\"user.php?u=$userid\" style=\"color: black; text-decoration: none;\">$requesting_username</a></b>
              <h5>Service: $service</h5>
              <p>Description: $description</p>
              <p>Date Needed: $date | Priority: $priority</p>
              </div>";        
         }
         }
         }
    ?>
    <a href="Request.php"><button id="my_request_btn">Post a New Request</Button></a>
    <br><br>
    <h2>My Volunteer Work</h2>
    <!--Request cards generated for users requests. Automatically sorts by Date.-->
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
     $sql = "SELECT *, volunteers_requests.userid AS 'volunteerID', customers.id AS 'requestorID'
     FROM volunteers_requests
     JOIN requests ON requests.request_id = volunteers_requests.requestid
     JOIN customers ON requests.userid = customers.id";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

      while($row = $result->fetch_assoc()){
        $requestorID = $row["requestorID"];
        $title = $row["title"];
        $service = $row["service"];
        $date = $row["date"];
        $description = $row["description"];
        $requesting_username = $row["fname"] . " " . $row["lname"];
        $priority = $row["status"];
        $requestor_email = $row["email"];
        $resuestor_phone = $row["phone"];


        $sessionID = $_SESSION['logged_in_id'];

        echo "<div class=\"requestCard\">
              <h2>$title</h2>
              <b><a href=\"user.php?u=$requestorID\" style=\"color: #0099ff; text-decoration: none;\">$requesting_username</a></b>
              <h5>Service: $service</h5>
              <p>Description: $description</p>
              <p>Date Needed: $date | Priority: $priority</p>
              <h3>Contact Info</h3>
              <p>E-mail: $requestor_email</p>
              <p>Phone: $resuestor_phone</p>
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
