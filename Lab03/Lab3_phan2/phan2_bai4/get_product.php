<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Check if ID is provided
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['error' => 'Invalid product ID']);
    exit;
}

$productId = $_GET['id'];

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get the specific product
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    // Get product data
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // If product doesn't exist, return error
    if(!$product) {
        echo json_encode(['error' => 'Product not found']);
        exit;
    }

    // Return product data as JSON
    header('Content-Type: application/json');
    echo json_encode($product);

} catch(PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit;
}
?>