<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->name) &&
    !empty($data->price)
) {
    $product->name = $data->name;
    $product->description = $data->description;
    $product->price = $data->price;
    $product->image = $data->image;

    $errors = $product->validate();

    if (empty($errors)) {
        if ($product->create()) {
            http_response_code(201);

            echo json_encode(array("message" => "Product was created."));
        } else {
            http_response_code(503);

            echo json_encode(array("message" => "Unable to create product."));
        }
    } else {
        http_response_code(400);

        echo json_encode(array("message" => "Unable to create product.", "errors" => $errors));
    }
} else {
    http_response_code(400);

    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>