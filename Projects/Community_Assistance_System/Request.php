<?php 
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
<div class="row">
		<h1>Request Services:</h1>
			<p>Please Complete the form below to request services<p>
			<form id="requestform" action="request_submit.php" method="POST">
             <input type="hidden" name="customer_id" id="customer_id", value="<?php echo $_SESSION['logged_in_id']?>" required>
				<!--Title-->
				<label for="title">Post Title</label><br>
				<input type="text" id="title" name="title"  required><br>
				<!--Description-->
				<label for="descriptiontext">Description</label><br>
				<textarea maxlength="250" id="descriptiontext" name="descriptiontext" style="resize: none;" required></textarea><br>
				<!----Date---->
                    <label for="date">Date:</label><br>
                    <input type="date" name="date" id="date" required>
				<!---Services--->
					<label for="service">Services</label><br>
					 <select name="service" id="service" required>
					  <option value="Grocery">Groceries</option>
					  <option value="Yardwork">Yardwork</option>
					  <option value="Care">Care</option>
					  <option value="Home Maintenance">Home Maintenance</option>
					  <option value="Cleaning">Cleaning</option>
					  <option value="Disaster Relief">Disaster Relief</option>
					  <option value="Ride Share">Ride Share</option>
					  <option value="Other">Other</option>
					</select>
					<br><br>
				<!----Status---->	
					<label for="status">Priority:</label><br>
					 <select name="status" id="status" required>
					  <option value="normal" selected>Normal</option>
					  <option value="urgent">Urgent</option>
					</select>
						
				<!----Hidden Customer ID---->

				<!----Submit Button---->	
				<input type="submit" class="btn btn-primary" name="submit" value="Submit">
			</form>
</div>					
<div class="footer">
<?php
  include('footer.php');
  ?>
</div>

</body>
</html>
