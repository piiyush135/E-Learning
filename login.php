<?php
session_start();
require('connection.php');

if(isset($_POST['login'])) {
    $email_username = $_POST['username'];
    $password = $_POST['password'];
    
    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM registered_user WHERE (`E-mail`=? OR username=?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email_username, $email_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($result && mysqli_num_rows($result) == 1) {
       $result_fetch = mysqli_fetch_assoc($result);
       $hashed_password_from_db = $result_fetch['Password'];
 
       // Comparing the entered password with the hashed password using password_verify()
       if(password_verify($password, $hashed_password_from_db)) {
          $_SESSION['logged_in'] = true;
          $_SESSION['username'] = $result_fetch['Username'];
          header("Location: main.html");
          exit();
       } else {
          showErrorAlert("Incorrect password", "index.php");
       }
    } else {
       showErrorAlert("Email or Username Not Registered", "index.php");
    }
}

// Define the showErrorAlert function
function showErrorAlert($message, $redirectUrl) {
    echo "<script>alert('$message'); window.location.href='$redirectUrl';</script>";
    exit();
}
?>
