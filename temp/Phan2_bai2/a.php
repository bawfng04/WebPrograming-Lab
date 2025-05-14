<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .actions { display: flex; gap: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <div class="mb-3">
            <a href="b.php" class="btn btn-success">Add New Product</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <tr>
                        <td colspan="6" class="text-center">Loading products...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Lấy danh sách sản phẩm khi trang được tải
            loadProducts();

            function loadProducts() {
                $.ajax({
                    url: "api/product/read.php",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        let html = "";
                        if (data.records) {
                            $.each(data.records, function(key, product) {
                                // Giới hạn mô tả
                                let shortDesc = product.description;
                                if (shortDesc && shortDesc.length > 100) {
                                    shortDesc = shortDesc.substring(0, 100) + '...';
                                }

                                html += `
                                    <tr>
                                        <td>${product.id}</td>
                                        <td>${product.name}</td>
                                        <td>${shortDesc || ''}</td>
                                        <td>${product.price}</td>
                                        <td>${product.image ? `<img src="${product.image}" width="50" alt="${product.name}">` : ''}</td>
                                        <td class="actions">
                                            <a href="detail.php?id=${product.id}" class="btn btn-info btn-sm">View</a>
                                            <a href="c.php?id=${product.id}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="d.php?id=${product.id}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                `;
                            });
                        } else {
                            html = `<tr><td colspan="6" class="text-center">No products found</td></tr>`;
                        }

                        $("#product-list").html(html);
                    },
                    error: function() {
                        $("#product-list").html(`<tr><td colspan="6" class="text-center text-danger">Error loading products</td></tr>`);
                    }
                });
            }
        });
    </script>
</body>
</html>