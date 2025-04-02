<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['error' => 'Invalid product ID']);
    exit;
}

$productId = $_GET['id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$product) {
        echo json_encode(['error' => 'Product not found']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode($product);

} catch(PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit;
}
?>