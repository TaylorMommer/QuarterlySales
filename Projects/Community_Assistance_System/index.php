<?php
session_start();
include('login.php');

//if the user is already logged in then redirect user to the home page
if(isset($_SESSION["logged_in_id"]) === true){
	header("location: home.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1, width=device-width, initial-scale=1">
    <link href="CSS/index.css" rel="stylesheet" />
</head>
<body>
    <div id="login">
        <!--Header contains the login button-->
        <div id="loginheader">
            <button id="loginbtn" onclick="displayLoginScreen()">Log In</button>
            <button id="signupbtn" onclick="displaySignUpScreen()">Sign Up</button>
        </div>

        <!--Login Content contains 2 divs. "welcome" is the welcome screen. The "login screen" displays once the login button is pressed-->
        <div id="logincontent">
            <div id="welcome">
                <img src="Images/neighbors.png" id="neighborsimg" alt="neighbors" />
                <h1>Welcome to Community Assistance</h1>
            </div>
        </div>

        <!--Login footer contains a link to the learnmore page-->
        <div id="loginfooter">
            <a href="#learnmore">Learn More about the Community Assistance App &#8595</a>
        </div>
    </div>

    <!--Learn More section-->
    <div id="learnmore"><p>filler</p></div>

    <!--Login and Sign up will be on a splash screen over everything-->
    <div id="splashscreen">
        <div id="splashbackground" onclick="hideSplashScreen()">
        </div>

        <div id="splashform">
            <!--Log In Form-->
            <div id="loginscreen">
                <img src="Images\neighbors-notext.png" id="splashimage" />
                <h2>Login to Your Assistant</h2>
                <form id="loginform" action="" method="POST">
                    <label for="loginemail">Email</label><br>
                    <input type="email" name="loginemail" id="loginemail" required>
                    <br><br>
                    <label for="loginpassword">Password</label><br>
                    <input type="password" name="loginpassword" id="loginpassword" required>
                    <br>
                    <?php echo $loginError?>
                    <br>
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                </form>
                <br><br><br>
                <p>Don't have an account?</p>
                <a href="#" onclick="hideSplashScreen(); displaySignUpScreen()">Sign up!</a>
            </div>

            <!--Sign Up Form-->
            <div id="signupscreen">
                <br>
                <h2>Sign up for Community Assistance</h2>
                <form id="signupform" action="register.php" method="POST">
					<!--customer_id--->
                    <input type="hidden" name="id" id="id", value="" required>
					
                    <!--Name--->
					<label for="fname">First Name</label><br>
                    <input type="text" name="fname" id="fname" required>
                    <br><br>

					<label for="lname">Last Name</label><br>
                    <input type="text" name="lname" id="lname" required>
					<br><br>

                    <!--phone number--->					
                    <label for="phone">Phone</label><br>
                    <input type="tel" name="phone" id="phone" required>
                    <br><br>
					
                    <!--address--->
                    <label for="streetAddress">Address</label><br>
                    <input type="text" name="streetAddress" id="streetAddress" required />
                    <br><br>
                    <!----Zip-->
                    <label for="zip">Zip Code</label><br />
                    <input type="text" name="zip" id="zip" required />
                    <br /><br />

					<!--email--->
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required>
                    <br><br>
                    
					<!--password--->
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required>
                    <br><br>
					
                    <!--confirm_password--->
                    <label for="confirm_password">Confirm Password</label><br>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    
                    <br><br><br>
					<!---submit--->
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">I agree to the Community Assistance Terms of Service.</label>
					<!---submit--->					
                    <br><br>
                    <input type="submit" name="signup" class="btn btn-primary" value="Sign Up">
                </form>
                <br>
                <p>Already have an account?</p>
                <a href="#" onclick="hideSplashScreen(); displayLoginScreen();">Log In!</a>
            </div>
        </div>
    </div>
    <script src="Scripts\index.js"></script>
</body>
</html>