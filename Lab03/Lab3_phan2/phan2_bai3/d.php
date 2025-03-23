<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Initialize variables
$id = $name = $description = $price = $image = "";
$errors = [];
$success = false;
$notFound = false;
$confirmed = false;

// Check if ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $confirmed = isset($_POST['confirm']) && $_POST['confirm'] === 'yes';
} else {
    header("Location: a.php");
    exit;
}

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Process deletion if confirmed
    if ($confirmed) {
        try {
            // Prepare SQL statement
            $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");

            // Bind parameters
            $stmt->bindParam(':id', $id);

            // Execute the query
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $success = true;
            } else {
                $errors[] = "Product could not be deleted or does not exist.";
            }

        } catch(PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    } else {
        // Fetch product data to confirm deletion
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $notFound = true;
        } else {
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $product['name'];
            $description = $product['description'];
            $price = $product['price'];
            $image = $product['image'];
        }
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
    <title>Delete Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        .product-image {
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Delete Product</h1>

        <?php if ($notFound): ?>
            <div class="alert alert-danger">
                Product not found. <a href="a.php" class="alert-link">Back to list</a>
            </div>
        <?php elseif ($success): ?>
            <div class="alert alert-success">
                Product deleted successfully!
            </div>
            <a href="a.php" class="btn btn-primary">Back to List</a>
        <?php else: ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    Confirm Deletion
                </div>
                <div class="card-body">
                    <h5 class="card-title">Are you sure you want to delete this product?</h5>
                    <p class="card-text">This action cannot be undone.</p>

                    <div class="mb-3">
                        <strong>ID:</strong> <?php echo $id; ?>
                    </div>
                    <div class="mb-3">
                        <strong>Name:</strong> <?php echo htmlspecialchars($name); ?>
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong>
                        <p><?php echo htmlspecialchars($description); ?></p>
                    </div>
                    <div class="mb-3">
                        <strong>Price:</strong> $<?php echo number_format($price, 2); ?>
                    </div>
                    <?php if (!empty($image)): ?>
                        <div class="mb-3">
                            <strong>Image:</strong>
                            <img src="<?php echo htmlspecialchars($image); ?>" alt="Product Image" class="product-image">
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="confirm" value="yes">

                        <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
                        <a href="a.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>