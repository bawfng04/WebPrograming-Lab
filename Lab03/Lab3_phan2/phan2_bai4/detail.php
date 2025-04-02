<?php
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: list.php");
    exit;
}

$productId = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      .related-product {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
      }
      .related-product:hover {
        background-color: #f9f9f9;
        transform: translateY(-3px);
        box-shadow: 0 3px 5px rgba(0,0,0,0.1);
      }
      .related-product img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        margin-bottom: 8px;
      }
      .related-product h4 {
        font-size: 14px;
        margin: 5px 0;
      }
      .related-product .price {
        font-weight: bold;
        color: #e74c3c;
      }
      #loadingIndicator {
        text-align: center;
        padding: 20px;
        color: #666;
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
          <input type="text" placeholder="Search" id="headerSearch">
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
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" id="mainProductImage">
              </div>
              <div class="thumbnail-container">
                <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                  <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 1">
                </div>
                <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                  <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 2">
                </div>
                <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                  <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 3">
                </div>
                <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                  <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 4">
                </div>
              </div>
            </div>

            <div class="product-info">
              <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
              <div class="product-summary">
                <h3>Price: $<span id="productPrice"><?php echo number_format($product['price'], 2); ?></span></h3>
                <p><?php echo htmlspecialchars(substr($product['description'], 0, 150)); ?>...</p>
              </div>
              <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" min="1" value="1" style="width: 60px; margin-right: 10px;">
              </div>
              <button id="addToCartBtn" class="buy-button" data-id="<?php echo $product['id']; ?>">Add to Cart</button>
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
              <div id="relatedProducts">
                <div id="loadingIndicator">Loading related products...</div>
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

    <script>
      $(document).ready(function() {
        // AJAX
        $.ajax({
          url: 'get_related_products.php',
          type: 'GET',
          data: {
            id: <?php echo $productId; ?>
          },
          dataType: 'json',
          success: function(data) {
            let html = '';
            if(data.length > 0) {
              data.forEach(function(product) {
                html += `
                  <div class="related-product">
                    <a href="detail.php?id=${product.id}">
                      <img src="${product.image}" alt="${product.name}">
                      <h4>${product.name}</h4>
                      <span class="price">$${parseFloat(product.price).toFixed(2)}</span>
                    </a>
                  </div>
                `;
              });
            } else {
              html = '<p>No related products found.</p>';
            }

            $('#relatedProducts').html(html);
          },
          error: function(xhr, status, error) {
            console.error('Error loading related products:', error);
            $('#relatedProducts').html('<p>Error loading related products. Please try again.</p>');
          }
        });

        $('.thumbnail').click(function() {
          const imageUrl = $(this).data('image');
          $('#mainProductImage').attr('src', imageUrl);
        });

        $('#headerSearch').keypress(function(e) {
          if(e.which == 13) {
            const searchTerm = $(this).val();
            if(searchTerm.trim() !== '') {
              window.location.href = `list.php?search=${encodeURIComponent(searchTerm)}`;
            }
          }
        });

        $('#addToCartBtn').click(function() {
          const productId = $(this).data('id');
          const quantity = $('#quantity').val();

          $(this).text('Added!');
          $(this).css('background-color', '#2ecc71');

          setTimeout(() => {
            $(this).text('Add to Cart');
            $(this).css('background-color', '');
          }, 1500);

          console.log(`Added product ${productId} to cart, quantity: ${quantity}`);
        });
      });
    </script>
  </body>
</html>