<?php
// Assuming your database credentials
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "gp"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID and password from the form
$id = $_POST['id'];
$password = $_POST['password'];

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM sign WHERE id=? AND password=?");
$stmt->bind_param("ss", $id, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if there's a matching row
if ($result->num_rows == 1) {
    // Redirect to another page if login is successful
    header("Location: studentHome.php");
    exit();
} else {
    echo "Invalid ID or password";
}

$stmt->close();
$conn->close();
?>
