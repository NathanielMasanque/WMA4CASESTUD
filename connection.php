<?php
$conn = new mysqli('localhost', 'username', 'password', 'reloved_fashion');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch featured items
$sql = "SELECT * FROM featured_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Price: " . $row["price"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>