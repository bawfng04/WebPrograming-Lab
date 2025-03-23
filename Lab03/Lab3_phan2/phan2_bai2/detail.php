<?php
// Check if product ID is provided
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: list.php");
    exit;
}

$productId = $_GET['id'];

// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "shop";

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

    // If product doesn't exist, redirect to list page
    if(!$product) {
        header("Location: list.php");
        exit;
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .main-image::before, .main-image::after {
        display: none;
      }
      .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .thumbnail::before, .thumbnail::after {
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="main-main-div">
      <header>
        <div class="header-left">
          <span class="site-title">Products Shop</span>
          <span class="top-links">
            <a href="list.php">Products</a> | <a href="#">Contact us</a> |
            <a href="#">Follow us</a>
          </span>
        </div>
        <div class="search-container">
          <input type="text" placeholder="Search">
        </div>
      </header>

      <div class="main-container">
        <div class="sidebar">
          <div class="category-header">Categories</div>
          <div class="sidebar-items">
            <div class="sidebar-item">USB & Storage</div>
            <div class="sidebar-item">SSDs</div>
            <div class="sidebar-item">RAM & Memory</div>
            <div class="sidebar-item">Peripherals</div>
            <div class="sidebar-item">Accessories</div>
          </div>
          <div class="sidebar-section">
            <h3>Top Products</h3>
            <div class="sidebar-item">USB Kingston 3.0</div>
            <div class="sidebar-item">External SSD</div>
            <div class="sidebar-item">RAM Laptop Samsung</div>
            <div class="sidebar-item">External Hard Drive</div>
            <div class="sidebar-item">Mechanical Keyboard</div>
          </div>
        </div>

        <div class="content">
          <div class="breadcrumb">
            <a href="list.php">Home</a> &gt; <a href="list.php">Products</a> &gt;
            <?php echo htmlspecialchars($product['name']); ?>
          </div>

          <div class="product-container">
            <div class="product-images">
              <div class="main-image">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
              </div>
              <div class="thumbnail-container">
                <div class="thumbnail"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 1"></div>
                <div class="thumbnail"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 2"></div>
                <div class="thumbnail"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 3"></div>
                <div class="thumbnail"><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 4"></div>
              </div>
            </div>

            <div class="product-info">
              <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
              <div class="product-summary">
                <h3>Price: $<?php echo number_format($product['price'], 2); ?></h3>
                <p><?php echo htmlspecialchars(substr($product['description'], 0, 150)); ?>...</p>
              </div>
              <a href="#" class="buy-button">Add to Cart</a>
            </div>
          </div>

          <div class="product-description">
            <h3>Description:</h3>
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
          </div>
        </div>

        <div class="right-sidebar">
          <div class="right-sidebar1">
            <div style="padding: 15px;">
              <h3 style="margin-bottom: 10px;">Related Products</h3>
              <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #eee;">
                <a href="list.php" style="color: #000; text-decoration: none; font-weight: bold;">Browse more products</a>
              </div>
              <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #eee;">
                <a href="#" style="color: #000; text-decoration: none; font-weight: bold;">Special offers</a>
              </div>
              <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #eee;">
                <a href="#" style="color: #000; text-decoration: none; font-weight: bold;">New arrivals</a>
              </div>
            </div>
          </div>
          <div class="right-sidebar2">
            <div style="padding: 10px; text-align: center;">
              <p>Free shipping on orders over $50</p>
            </div>
          </div>
        </div>
      </div>

      <footer>
        <p>© 2023 Products Shop. All Rights Reserved.</p>
        <div>
          <a href="list.php">Home</a> | <a href="#">About Us</a> |
          <a href="#">Contact</a>
        </div>
      </footer>
    </div>
  </body>
</html>