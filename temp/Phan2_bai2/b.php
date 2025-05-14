
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .error-feedback { color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <div id="alert-container"></div>

        <form id="add-product-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="error-feedback" id="name-error"></div>
                <small class="form-text text-muted">Name must be between 5 and 40 characters</small>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                <div class="error-feedback" id="description-error"></div>
                <small class="form-text text-muted">Maximum 5000 characters</small>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
                <div class="error-feedback" id="price-error"></div>
            </div>

            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" class="form-control" id="image" name="image">
                <div class="error-feedback" id="image-error"></div>
                <small class="form-text text-muted">Maximum 255 characters</small>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="a.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Client-side validation
            function validateForm() {
                let isValid = true;
                const errors = {};

                // Validate name
                const name = $("#name").val().trim();
                if (!name) {
                    errors.name = "Name is required";
                    isValid = false;
                } else if (name.length < 5 || name.length > 40) {
                    errors.name = "Name must be between 5 and 40 characters";
                    isValid = false;
                }

                // Validate description
                const description = $("#description").val().trim();
                if (description && description.length > 5000) {
                    errors.description = "Description cannot exceed 5000 characters";
                    isValid = false;
                }

                // Validate price
                const price = $("#price").val().trim();
                if (!price) {
                    errors.price = "Price is required";
                    isValid = false;
                } else if (isNaN(price) || parseFloat(price) < 0) {
                    errors.price = "Price must be a positive number";
                    isValid = false;
                }

                // Validate image
                const image = $("#image").val().trim();
                if (image && image.length > 255) {
                    errors.image = "Image URL cannot exceed 255 characters";
                    isValid = false;
                }

                // Display errors
                $(".error-feedback").text("");
                if (!isValid) {
                    Object.keys(errors).forEach(key => {
                        $(`#${key}-error`).text(errors[key]);
                    });
                }

                return isValid;
            }

            // Submit form
            $("#add-product-form").on("submit", function(e) {
                e.preventDefault();

                if (!validateForm()) {
                    return false;
                }

                // Prepare data
                const formData = {
                    name: $("#name").val().trim(),
                    description: $("#description").val().trim(),
                    price: $("#price").val().trim(),
                    image: $("#image").val().trim()
                };

                // Send AJAX request
                $.ajax({
                    url: "api/product/create.php",
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(formData),
                    success: function(response) {
                        // Show success message
                        $("#alert-container").html(`
                            <div class="alert alert-success">
                                Product added successfully!
                            </div>
                        `);

                        // Reset form
                        $("#add-product-form")[0].reset();

                        // Redirect after 2 seconds
                        setTimeout(function() {
                            window.location.href = "a.php";
                        }, 2000);
                    },
                    error: function(xhr) {
                        let message = "An error occurred while adding the product";

                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.errors) {
                                // Display specific validation errors
                                Object.keys(response.errors).forEach(key => {
                                    $(`#${key}-error`).text(response.errors[key]);
                                });
                            }
                            if (response.message) {
                                message = response.message;
                            }
                        } catch (e) {}

                        $("#alert-container").html(`
                            <div class="alert alert-danger">
                                ${message}
                            </div>
                        `);
                    }
                });
            });
        });
    </script>
</body>
</html>