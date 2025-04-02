<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([]);
    exit;
}

$productId = $_GET['id'];

try {
    // PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM products WHERE id != :id LIMIT 3");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    $relatedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($relatedProducts);

} catch(PDOException $e) {
    echo json_encode([]);
    exit;
}
?>