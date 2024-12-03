<?php
// Database connection details
$servername = "localhost";
$username = "root"; 
$password = "saugat"; 
$dbname = "blog_api_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "Connected Unsuccessfully";
}
?>

