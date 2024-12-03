<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Include the database connection
require '../db_connection.php';

// Get the blog ID from the query parameter
$id = $_GET['id'];

// SQL query to fetch the blog by ID
$sql = "SELECT * FROM blogs WHERE id = $id";
$result = $conn->query($sql);

// Check if the blog is found
if ($result->num_rows > 0) {
    $blog = $result->fetch_assoc();
    echo json_encode($blog); // Return the blog as JSON
} else {
    echo json_encode(["message" => "Blog not found"]);
}

// Close the connection
$conn->close();
?>    