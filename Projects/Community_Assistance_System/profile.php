<?php 
include_once('LoggedInToSession.php');
include('PHPscripts\updateProfile.php');
include('PHPscripts\updatePassword.php');
$updateAddress = $_SESSION['logged_in_streetAddress'];
$updateZip = $_SESSION['logged_in_zip'];
$updateEmail = $_SESSION['logged_in_email'];
$updatePhone = $_SESSION['logged_in_phone'];
$userID = $_SESSION['logged_in_id'];
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
	<img src="Images/neighbors.jpg" id="headerImage" alt="neighbors" />
	<h1>Welcome to Community Assistance</h1>
	</div>
<div class="topnav">
<?php 
include_once('topnav.php');
?>
</div>

<!-----------------------Left Column(Content)---------------------------->
<div class="row">
  <div class="leftcolumn">
    <div class="profile">
        
        <?php echo $success?>
        <h2>Profile</h2>
        <p>Name: <?php echo $_SESSION['logged_in_fname'] . " " . $_SESSION['logged_in_lname']?></p>
        <br>
        <h2>Change Password</h2>
            <form action="" method="POST">
              <input type="hidden" id="myIDpass" name="myIDpass" value="<?php echo $_SESSION['logged_in_id'];?>">
                <label for="oldPassword">Old Password:</label>
                <input type="password" id="oldPassword" name="oldPassword" required>
                <br><br>
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <br><br>
                <label for="newPassword2">Confirm New Password:</label>
                <input type="password" id="newPassword2" name="newPassword2" required>
                <br><?php echo $passwordError2?>
                <?php echo $passwordError?><br>
                <button type="submit" id="submitPassword" name="submitPassword">Change Password</button>
            </form>

            <h2>Personal Information</h2>
            <form action="" method="POST">
              <input type="hidden" id="myID" name="myID" value="<?php echo $_SESSION['logged_in_id'];?>">
              <input type="hidden" id="myEmail" name="myEmail" value="<?php echo $_SESSION['logged_in_email'];?>">
              <label for="address">Address:</label>
              <input type="text" id="address" name="address" value="<?php echo $updateAddress?>">
              <br><br>
              <label for="zip">Zip:</label>
              <input type="text" id="zip" name="zip" value="<?php echo $_SESSION['logged_in_zip']?>">
              <br><br>
              <label for="email">E-mail:</label>
              <input type="text" id="email" name="email" value="<?php echo $_SESSION['logged_in_email']?>" disabled>
              <br><br>
              <label for="phone">Phone Number:</label>
              <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['logged_in_phone']?>">
              <br><br>
              <button type="submit" id="submitProfile" name="submitProfile">Update</button>
              <br> <?php echo $error?>
          </form>
    </div>
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
