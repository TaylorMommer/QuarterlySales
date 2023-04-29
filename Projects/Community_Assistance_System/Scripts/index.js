function displayLoginScreen() {
    var splashscreen = document.getElementById("splashscreen"); 
    var loginscreen = document.getElementById("loginscreen");

      splashscreen.style.display = "flex";
      loginscreen.style.display = "block";


  }

  function displaySignUpScreen() {
    var splashscreen = document.getElementById("splashscreen"); 
    var signupscreen = document.getElementById("signupscreen");

      splashscreen.style.display = "flex";
      signupscreen.style.display = "block";


  }
  
  
  

  function hideSplashScreen() {
    var splashscreen = document.getElementById("splashscreen"); 
    var loginscreen = document.getElementById("loginscreen");
    var signupscreen = document.getElementById("signupscreen");
    

    splashscreen.style.display = "none";
      loginscreen.style.display = "none";
      signupscreen.style.display = "none";
   


  }
  