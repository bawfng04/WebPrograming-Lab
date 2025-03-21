<?php
$result = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST["number1"]) ? (float)$_POST["number1"] : 0;
    $num2 = isset($_POST["number2"]) ? (float)$_POST["number2"] : 0;
    $operator = isset($_POST["operator"]) ? $_POST["operator"] : "add";

    try {
        switch ($operator) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    throw new Exception("Không thể chia cho 0");
                }
                $result = $num1 / $num2;
                break;
            case "power":
                $result = pow($num1, $num2);
                break;
            case "inverse":
                if ($num1 == 0) {
                    throw new Exception("Không thể tính nghịch đảo của 0");
                }
                $result = 1 / $num1;
                break;
            default:
                throw new Exception("Phép tính không hợp lệ");
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Tính Toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Kết Quả Tính Toán</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php elseif ($result !== ''): ?>
            <div class="alert alert-success">
                Kết quả: <?php echo number_format($result, 2); ?>
            </div>
        <?php endif; ?>
        <a href="calculator.html" class="btn btn-primary">Quay lại</a>
    </div>
</body>
</html>