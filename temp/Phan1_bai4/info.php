<?php
session_start();

// check user login chưa
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        .info-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        .info {
            margin: 20px 0;
            font-size: 18px;
        }
        .logout-btn {
            background: #f44336;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .logout-btn:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h2>User Information</h2>

        <div class="info">
            You are logged in as: <strong><?php echo htmlspecialchars($username); ?></strong>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>