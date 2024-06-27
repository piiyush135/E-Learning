<?php
$con = mysqli_connect("localhost", "root", "", "tes");

// Check connection
if (mysqli_connect_error()) {
    $error_message = mysqli_connect_error();
    // Log the error to a file for reference
    error_log("Database connection error: $error_message", 0);
    
    // Redirect to an error page or display a message
    echo "<script>alert('Unable to connect to the database. Please try again later.');</script>";
    exit();
}
?>