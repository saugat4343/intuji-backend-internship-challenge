<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

// Include the database connection
require '../db_connection.php';

// Get the JSON input from the request body
$data = json_decode(file_get_contents("php://input"));

// Check if data is received
if (isset($data->title) && isset($data->description) && isset($data->category)) {
    $title = $data->title;
    $description = $data->description;
    $category = $data->category;

    // SQL query to insert a new blog into the database
    $sql = "INSERT INTO blogs (title, description, category) VALUES ('$title', '$description', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Blog created successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}

// Close the connection
$conn->close();
?>
