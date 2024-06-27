<?php require('connection.php'); 
if (isset($_GET['registration_success']) && $_GET['registration_success'] == 'true') {
  echo "<script>alert('Registration successful');</script>";
}
session_start();
if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') {
  echo '<script>alert("Incorrect password.");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login&Register</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("passwordField");

        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    function validateEmail(email) {
// Regular expression for email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateForm() {
    var emailInput = document.getElementById("email").value;
    
    if (!validateEmail(emailInput)) {
        alert("Please enter a valid email address.");
        return false; // Prevent form submission
    }
    // Proceed with form submission
    return true;
}
</script>
</head>
<body>
  
 <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login_register.php" method="POST" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock togglePassword" onclick="togglePasswordVisibility()"></i>
                        <input type="password" name="password" id="passwordField" placeholder="Password" required>
                    </div>
                    <input type="submit" value="Login" class="btn solid" name="login">
                    <p class="social-text">Or Login with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <form action="login_register.php" method="POST" class="sign-up-form">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fullname" placeholder="Fullname" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" value="Register" class="btn solid" name="register">
                    <p class="social-text">Or Register with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>New here</h3>
                <p>Fill all the Fields with your Details.</p>
                <button class="btn transparent" id="sign-up-btn">Register</button>
            </div>
            <img src="./img/log.svg" class="image" alt="">
        </div>

        <?php
   if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
   {
    echo"<h1 style='text-algin: center; margin-top: 200px'> WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
   }
  ?>

<script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us</h3>
                <p>login with your Details entered during the Registration</p>
                <button class="btn transparent" id="sign-in-btn">Login</button>
            </div>
            <img src="./img/register.svg" class="image" alt="">
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
</body>
</html>