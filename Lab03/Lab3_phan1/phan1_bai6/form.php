<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    $firstName = trim($_POST['firstName'] ?? '');
    if (strlen($firstName) < 2 || strlen($firstName) > 30) {
        $errors[] = "First Name phải từ 2 đến 30 kí tự.";
    }

    // Validate Last Name
    $lastName = trim($_POST['lastName'] ?? '');
    if (strlen($lastName) < 2 || strlen($lastName) > 30) {
        $errors[] = "Last Name phải từ 2 đến 30 kí tự.";
    }

    // Validate Email
    $email = trim($_POST['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }

    // Validate Password
    $password = $_POST['password'] ?? '';
    if (strlen($password) < 2 || strlen($password) > 30) {
        $errors[] = "Password phải từ 2 đến 30 kí tự.";
    }

    // Validate Birthday
    $day = $_POST['day'] ?? '';
    $month = $_POST['month'] ?? '';
    $year = $_POST['year'] ?? '';
    if (empty($day) || empty($month) || empty($year)) {
        $errors[] = "Vui lòng chọn đầy đủ Birthday (Day, Month, Year).";
    }

    // Validate Gender
    $gender = $_POST['gender'] ?? '';
    if (empty($gender)) {
        $errors[] = "Vui lòng chọn Gender.";
    }

    // Validate Country
    $country = $_POST['country'] ?? '';
    if (empty($country)) {
        $errors[] = "Vui lòng chọn Country.";
    }

    // Validate About
    $about = trim($_POST['about'] ?? '');
    if (strlen($about) > 10000) {
        $errors[] = "About không được vượt quá 10000 kí tự.";
    }

    // Return response
    header('Content-Type: application/json');
    if (empty($errors)) {
        echo json_encode(['status' => 'success', 'message' => 'Complete!']);
    } else {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
    exit;
}
?>