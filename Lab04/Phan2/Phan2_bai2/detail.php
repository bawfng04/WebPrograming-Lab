<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .product-image { max-height: 300px; }
    </style>
</head>
<body>
    <div class="container">
        <div id="alert-container"></div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 id="product-name" class="h3 m-0">Loading product...</h1>
                <a href="a.php" class="btn btn-primary">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <div id="product-image-container">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4>Product Details</h4>
                        <table class="table">
                            <tr>
                                <th width="120">ID:</th>
                                <td id="product-id"></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td id="product-name-value"></td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td id="product-price"></td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td id="product-description"></td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <a id="edit-link" class="btn btn-warning">Edit</a>
                            <a id="delete-link" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
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
                $(".card").hide();
                return;
            }

            // Set up action links
            $("#edit-link").attr("href", `c.php?id=${productId}`);
            $("#delete-link").attr("href", `d.php?id=${productId}`);

            // Load product data
            loadProduct(productId);

            function loadProduct(id) {
                $.ajax({
                    url: `api/product/read_one.php?id=${id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#product-name, #product-name-value").text(data.name);
                        $("#product-id").text(data.id);
                        $("#product-price").text('$' + data.price);

                        if (data.description) {
                            $("#product-description").text(data.description);
                        } else {
                            $("#product-description").html('<em>No description available</em>');
                        }

                        if (data.image) {
                            $("#product-image-container").html(`
                                <img src="${data.image}" alt="${data.name}" class="img-fluid product-image">
                            `);
                        } else {
                            $("#product-image-container").html(`
                                <div class="p-5 bg-light text-center">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                    <p class="mt-3">No image available</p>
                                </div>
                            `);
                        }
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

                        // Show simplified card with error
                        $("#product-name").text("Error Loading Product");
                        $("#product-image-container, .table, .mt-4").hide();
                    }
                });
            }
        });
    </script>
</body>
</html>