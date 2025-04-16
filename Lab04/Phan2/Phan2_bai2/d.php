
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Product</h1>
        <div id="alert-container"></div>

        <div id="product-details" class="card mb-4">
            <div class="card-header">
                <h2 id="product-name" class="h5 m-0">Product Name</h2>
            </div>
            <div class="card-body">
                <p class="card-text" id="product-description">Loading product details...</p>
                <p class="card-text"><strong>Price:</strong> <span id="product-price"></span></p>
                <div id="product-image-container" class="mb-3"></div>
            </div>
        </div>

        <div id="confirm-delete" class="alert alert-danger">
            <p>Are you sure you want to delete this product? This action cannot be undone.</p>
            <button id="delete-btn" class="btn btn-danger">Yes, Delete Product</button>
            <a href="a.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Get product ID from URL
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            if (!productId) {
                $("#alert-container").html(`
                    <div class="alert alert-danger">
                        No product ID specified.
                    </div>
                `);
                $("#product-details, #confirm-delete").hide();
                return;
            }

            // Load product data
            loadProduct(productId);

            function loadProduct(id) {
                $.ajax({
                    url: `api/product/read_one.php?id=${id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#product-name").text(data.name);
                        $("#product-description").text(data.description || 'No description available');
                        $("#product-price").text('$' + data.price);

                        if (data.image) {
                            $("#product-image-container").html(`
                                <img src="${data.image}" alt="${data.name}" class="img-fluid" style="max-height: 200px;">
                            `);
                        } else {
                            $("#product-image-container").html('<p>No image available</p>');
                        }

                        // Set up delete button with product ID
                        $("#delete-btn").data('id', data.id);
                    },
                    error: function(xhr) {
                        let message = "Failed to load product data";

                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                message = response.message;
                            }
                        } catch (e) {}

                        $("#alert-container").html(`
                            <div class="alert alert-danger">
                                ${message}
                            </div>
                        `);
                        $("#product-details, #confirm-delete").hide();
                    }
                });
            }

            // Delete product
            $("#delete-btn").on("click", function() {
                const id = $(this).data('id');

                // Disable button to prevent multiple clicks
                $(this).attr('disabled', true).text('Deleting...');

                $.ajax({
                    url: "api/product/delete.php",
                    type: "DELETE",
                    contentType: "application/json",
                    data: JSON.stringify({ id: id }),
                    success: function(response) {
                        // Show success message
                        $("#alert-container").html(`
                            <div class="alert alert-success">
                                Product deleted successfully!
                            </div>
                        `);

                        // Hide product details and confirm message
                        $("#product-details, #confirm-delete").hide();

                        // Redirect after 2 seconds
                        setTimeout(function() {
                            window.location.href = "a.php";
                        }, 2000);
                    },
                    error: function(xhr) {
                        let message = "An error occurred while deleting the product";

                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                message = response.message;
                            }
                        } catch (e) {}

                        $("#alert-container").html(`
                            <div class="alert alert-danger">
                                ${message}
                            </div>
                        `);

                        // Re-enable button
                        $("#delete-btn").attr('disabled', false).text('Yes, Delete Product');
                    }
                });
            });
        });
    </script>
</body>
</html>