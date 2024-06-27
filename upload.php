<?php
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Check if file is a PDF
if($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (optional)
if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Upload file if everything is ok
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert file information into database
$sql = "INSERT INTO files (filename, filepath) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $filename, $filepath);

$filename = basename($_FILES["fileToUpload"]["name"]);
$filepath = $targetFile;

if ($stmt->execute()) {
    echo "File information stored in database.";
} else {
    echo "Error storing file information: " . $conn->error;
}

$stmt->close();
$conn->close();