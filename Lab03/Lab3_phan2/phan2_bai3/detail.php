<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Initialize variables
$id = "";
$errors = [];
$notFound = false;

// Check if ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: a.php");
    exit;
}

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch product data
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $notFound = true;
    } else {
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch(PDOException $e) {
    $errors[] = "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        .product-image {
            max-width: 300px;
            margin-bottom: 20px;
        }
        .product-details {
            margin-top: 20px;
        }
        .action-buttons {
            margin-top: 20px;
        }
        .description {
            white-space: pre-line;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Product Details</h1>

        <?php if ($notFound): ?>
            <div class="alert alert-danger">
                Product not found. <a href="a.php" class="alert-link">Back to list</a>
            </div>
        <?php elseif (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Product #<?php echo $product['id']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if (!empty($product['image'])): ?>
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image img-fluid">
                            <?php else: ?>
                                <div class="alert alert-secondary">No image available</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                            <p class="text-danger fw-bold fs-4">$<?php echo number_format($product['price'], 2); ?></p>

                            <div class="product-details">
                                <h4>Description</h4>
                                <p class="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                            </div>

                            <div class="action-buttons">
                                <a href="c.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Edit Product</a>
                                <a href="d.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Delete Product</a>
                                <a href="a.php" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>