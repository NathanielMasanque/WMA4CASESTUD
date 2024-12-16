<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $stmt = $conn->prepare("INSERT INTO cart_items (product_name, product_price) VALUES (?, ?)");
    $stmt->bind_param("sd", $product_name, $product_price); // "sd" means string, double

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Item added to cart."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding item to cart."]);
    }
    
    $stmt->close();
}
$conn->close();
?>