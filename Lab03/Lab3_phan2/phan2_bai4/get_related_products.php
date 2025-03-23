<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Check if ID is provided
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([]);
    exit;
}

$productId = $_GET['id'];

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get all products except the current one
    $stmt = $conn->prepare("SELECT * FROM products WHERE id != :id LIMIT 3");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    // Get related products
    $relatedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return products as JSON
    header('Content-Type: application/json');
    echo json_encode($relatedProducts);

} catch(PDOException $e) {
    echo json_encode([]);
    exit;
}
?>