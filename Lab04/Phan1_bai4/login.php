<?php
session_start();

// check user login chưa
// nếu đăng nhập -> chuyển đến trang info.php
if (isset($_SESSION['user'])) {
    header('Location: info.php');
    exit;
}

// Kiểm xet xem cookie "remember" có tồn tại không, và người dùng chưa đăng nhập
if (isset($_COOKIE['remember']) && !isset($_SESSION['user'])) {
    $token = $_COOKIE['remember'];
    $parts = explode(':', $token);

    if (count($parts) == 2) {
        $username = $parts[0];
        $tokenValue = $parts[1];
        // in username và tokenValue
        // echo "Username: $username<br>";
        // echo "Token Value: $tokenValue<br>";

        // Check token có hợp lệ không
        if ($tokenValue == md5($username . 'secret_key')) {
            $_SESSION['user'] = $username;
            header('Location: info.php');
            exit;
        }
    }
}

$error = '';

// Xử lý form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (!empty($username) && !empty($password)) {
        $_SESSION['user'] = $username;

        if ($remember) {
            $token = $username . ':' . md5($username . 'secret_key');

            setcookie('remember', $token, time() + 60*60*24*30, '/'); // 30 ngày
        }

        header('Location: info.php');
        exit;
    } else {
        $error = 'Username and password are required';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .checkbox-group label {
            margin-left: 5px;
            font-weight: normal;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>