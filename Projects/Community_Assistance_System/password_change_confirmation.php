<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1, width=device-width, initial-scale=1">
    <link href="CSS/index.css" rel="stylesheet" />
    <link href="CSS/logout.css" rel="stylesheet" />
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
        <div id="splashbackground" onclick="location.href='index.php'">
        </div>

        <div id="splashform">

            <!--Logout Splash-->
            <div id="logoutscreen">
                <img src="Images\neighbors-notext.png" id="splashimage" />
                <h2>Your Password Has Been Changed</h2>
                <h3>Please log back in with your new password.</h3>
                
                <a href="index.php">Log In!</a>
            </div>
        </div>
    </div>
    <script src="Scripts\index.js"></script>
</body>
</html>