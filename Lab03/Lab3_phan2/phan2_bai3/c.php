<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$id = $name = $description = $price = $image = "";
$errors = [];
$success = false;
$notFound = false;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
} else {
    header("Location: a.php");
    exit;
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $errors[] = "Name is required";
        } else {
            $name = trim($_POST["name"]);
            if (strlen($name) < 5 || strlen($name) > 40) {
                $errors[] = "Name must be between 5 and 40 characters";
            }
        }

        if (empty($_POST["description"])) {
            $errors[] = "Description is required";
        } else {
            $description = trim($_POST["description"]);
            if (strlen($description) > 5000) {
                $errors[] = "Description cannot exceed 5000 characters";
            }
        }

        if (empty($_POST["price"])) {
            $errors[] = "Price is required";
        } else {
            $price = trim($_POST["price"]);
            if (!is_numeric($price) || $price <= 0) {
                $errors[] = "Price must be a positive number";
            }
        }

        if (empty($_POST["image"])) {
            $errors[] = "Image URL is required";
        } else {
            $image = trim($_POST["image"]);
            if (strlen($image) > 255) {
                $errors[] = "Image URL cannot exceed 255 characters";
            }
        }

        if (empty($errors)) {
            try {
                $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id");

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':image', $image);

                $stmt->execute();

                $success = true;

            } catch(PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
            }
        }
    } else {
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
    <title>Edit Product</title>
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
        <h1 class="mb-4">Edit Product</h1>

        <?php if ($notFound): ?>
            <div class="alert alert-danger">
                Product not found. <a href="a.php" class="alert-link">Back to list</a>
            </div>
        <?php else: ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    Product updated successfully!
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-4">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    <div class="form-text">Must be between 5 and 40 characters.</div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
                    <div class="form-text">Maximum 5000 characters.</div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="<?php echo htmlspecialchars($price); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($image); ?>" required>
                    <div class="form-text">Maximum 255 characters.</div>
                    <?php if (!empty($image)): ?>
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Product Image" class="product-image">
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="a.php" class="btn btn-secondary">Back to List</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>