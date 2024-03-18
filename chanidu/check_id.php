<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "gp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from the AJAX request
$id = $_POST['id'];

// SQL to check if ID exists in the database
$sql = "SELECT * FROM studentinfo WHERE hostalId = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ID exists
    echo "exists";
} else {
    // ID does not exist
    echo "not_exists";
}

$conn->close();
?>
