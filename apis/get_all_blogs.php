<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Include the database connection
require '../db_connection.php';

// SQL query to fetch all blogs
$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);

// Check if any blogs are returned
if ($result->num_rows > 0) {
    $blogs = [];
    while($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
    echo json_encode($blogs); // Return the blogs as JSON
} else {
    echo json_encode(["message" => "No blogs found"]);
}

// Close the connection
$conn->close();
?>
