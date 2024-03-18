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

// Get data from the form
$id = $_POST['id'];
$password = $_POST['password'];

// SQL to insert data into table
$sql = "INSERT INTO sign (id, password) VALUES ('$id', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
