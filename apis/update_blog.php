<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');

// Include the database connection
require '../db_connection.php';

// Get the JSON input from the request body
$data = json_decode(file_get_contents("php://input"));

// Check if data is received
if (isset($data->id) && isset($data->title) && isset($data->description) && isset($data->category)) {
    $id = $data->id;
    $title = $data->title;
    $description = $data->description;
    $category = $data->category;

    // SQL query to update the blog in the database
    $sql = "UPDATE blogs SET title = '$title', description = '$description', category = '$category' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo json_encode(["message" => "Blog updated successfully"]);
        } else {
            // If no rows were affected, it means the id does not exist
            echo json_encode(["message" => "Blog not found"]);
        }
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}

// Close the connection
$conn->close();
?>
