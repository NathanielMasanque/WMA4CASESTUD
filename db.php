<?php
$servername = "localhost"; // Change to your database host if not localhost
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "reloved_fashion"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
