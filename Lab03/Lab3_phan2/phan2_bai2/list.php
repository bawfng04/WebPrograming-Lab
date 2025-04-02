<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Product List</title>
      <link rel="stylesheet" href="style1.css">
      <script>
         function showMenu() {
           document.querySelector('.h-sidebar').classList.toggle('h-hidden');
           console.log("test");
         }

         document.addEventListener('DOMContentLoaded', function() {
           document.querySelector('.h-close').addEventListener('click', function() {
             document.querySelector('.h-sidebar').classList.add('h-hidden');
           });
         });
      </script>
      <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .product-card {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 3px;
        }
        .product-name {
            font-size: 18px;
            margin: 10px 0;
            font-weight: bold;
        }
        .product-price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
            margin-top: 5px;
        }
        .view-details {
            display: inline-block;
            margin-top: 10px;
            background-color: #000066;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        .view-details:hover {
            background-color: #000088;
        }
      </style>
   </head>
   <body>
      <header>
      <div class="h-sidebar h-hidden">
        <div class="h-close">&times;</div>
        <div class="h-signin">Sign in</div>
        <ul class="h-menu">
            <li class="h-menu-item h-home">Home</li>
            <li class="h-menu-item">Finance</li>
            <li class="h-menu-item">Marketing</li>
            <li class="h-menu-item">Politics</li>
            <li class="h-menu-item">Technology</li>
            <li class="h-menu-item">Women</li>
            <li class="h-menu-item">Celebrity</li>
            <li class="h-menu-item">Travel</li>
            <li class="h-menu-item">Food</li>
            <li class="h-menu-item">Music</li>
        </ul>
      </div>
         <div class="top-bar">
            <div class="logo"> Products Shop </div>
            <div class="account">
               <a href="#" class="contact">About us</a>
               <a href="#" class="contact">Contact us</a>
            </div>
         </div>
         <nav class="abcd">
            <div class="menu hid" onclick="showMenu()">
               <img src="./image2.png" alt="menu">
            </div>
            <h2>
               Products<br>
               SHOP
            </h2>
            <div class="search hid">🔎</div>
            <ul>
               <li><a href="#" class="home">HOME</a></li>
               <li><a href="#" class="home">PRODUCTS</a></li>
               <li><a href="#" class="home">DEALS</a></li>
               <li><a href="#" class="home">CONTACT</a></li>
               <li><a href="#" class="home">ABOUT</a></li>
            </ul>
            <div class="search"> My account </div>
         </nav>
      </header>

      <div class="container">
         <div class="left-column">
            <div>
               <div class="bknab">
                  <div>
                     <h2 class="section-title">Featured Products</h2>
                     <div class="divider"></div>
                  </div>
                  <button class="readmore hid" type="submit">VIEW ALL</button>
               </div>
            </div>

            <!-- Product Grid -->
            <div class="product-grid">
               <?php foreach($products as $product): ?>
               <div class="product-card">
                  <div class="product-image">
                     <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                  </div>
                  <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                  <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                  <a href="detail.php?id=<?php echo $product['id']; ?>" class="view-details">View Details</a>
               </div>
               <?php endforeach; ?>
            </div>
         </div>

         <div class="middle-column">
            <div class="marketing-block">
               <span class="category marketing">Shop Deals</span>
               <h2 class="marketing-title">Best Deals For Tech Products</h2>
               <div class="image-placeholder">
                  <img src="./image.png" alt="placeholder">
               </div>
               <p class="marketing-desc">
                  Check out our latest tech deals with amazing discounts on popular products.
                  Limited time offers available now!
               </p>
            </div>
         </div>

         <div class="right-column">
            <h2 class="section-title">Popular Products:</h2>
            <?php
            // Get the first two products as popular items
            $popularCount = min(count($products), 2);
            for($i = 0; $i < $popularCount; $i++):
               $product = $products[$i];
            ?>
            <div class="popular-item">
               <span class="category finance">Featured</span>
               <p class="popular-desc"><?php echo htmlspecialchars($product['name']); ?></p>
               <div class="popular-image">
                  <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
               </div>
            </div>
            <?php endfor; ?>
         </div>
      </div>
<!--
      <div class="second">
         <div class="blackbar">
            <h1>Get 10% discount on your first purchase with our special offer!</h1>
            <button class="scrbtn">Shop Now</button>
         </div>
      </div> -->

      <!-- Footer and remaining content -->
      <div class="flex-a">
      <div class="f-footer">
      <div class="f-header">
         <h2 class="f-logo">Products<span>SHOP</span></h2>
         <div class="f-social">
            <a href="#" class="f-social-link"><img src="facebook.png" alt="Facebook"></a>
            <a href="#" class="f-social-link"><img src="instagram.png" alt="Instagram"></a>
            <a href="#" class="f-social-link"><img src="twitter.png" alt="Twitter"></a>
            <a href="#" class="f-social-link"><img src="youtube.png" alt="YouTube"></a>
         </div>
      </div>
      <nav class="f-main-nav">
         <a href="#" class="f-nav-link f-active">Home</a>
         <a href="#" class="f-nav-link">Products</a>
         <a href="#" class="f-nav-link">Deals</a>
         <a href="#" class="f-nav-link">About</a>
         <a href="#" class="f-nav-link">Contact</a>
      </nav>

      <div class="f-content">
         <div class="f-column">
            <h2 class="f-title">Company</h2>
            <p class="f-description">Find the best tech products at the best prices. We offer a wide selection of electronics, accessories, and more.</p>
            <div class="f-links">
               <a href="#" class="f-link">About us</a>
               <a href="#" class="f-link">Contact us</a>
            </div>
         </div>

         <div class="f-column">
            <h2 class="f-title">Support</h2>
            <div class="f-posts">
               <a href="#" class="f-post">FAQ</a>
               <a href="#" class="f-post">Shipping & Returns</a>
               <a href="#" class="f-post">Warranty Information</a>
            </div>
         </div>

         <div class="f-column">
            <h2 class="f-title">Shop</h2>
            <div class="f-posts">
               <a href="#" class="f-post">New Arrivals</a>
               <a href="#" class="f-post">Best Sellers</a>
               <a href="#" class="f-post">Sale Items</a>
            </div>
         </div>

         <div class="f-column">
            <h2 class="f-title">Categories</h2>
            <div class="f-sitemap">
               <a href="#" class="f-link">USB & Storage</a>
               <a href="#" class="f-link">SSDs</a>
               <a href="#" class="f-link">RAM & Memory</a>
               <a href="#" class="f-link">Peripherals</a>
               <a href="#" class="f-link">Accessories</a>
            </div>
         </div>
      </div>

      <div class="f-footer-bottom">
         <p class="f-copyright">© 2023 Products Shop. All Rights Reserved.</p>
         <div class="f-wave"></div>
      </div>
      </div>
      </div>
   </body>
</html>