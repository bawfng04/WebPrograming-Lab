<!DOCTYPE html>
<html>
<head>
    <title>Phần 1 bài 2</title>
</head>
<body>
    <form method="POST" action="">
        <label for="number">Enter a positive integer:</label>
        <input type="number" id="number" name="number" required>
        <button type="submit">Check</button>
    </form>

<?php
function checkRemainder($number) {
    if (!is_numeric($number) || $number <= 0 || floor($number) != $number) {
        return "Please enter a positive integer";
    }

    $remainder = $number % 5;

    switch ($remainder) {
        case 0:
            return "Hello";
        case 1:
            return "How are you?";
        case 2:
            return "I'm doing well, thank you";
        case 3:
            return "See you later";
        case 4:
            return "Good-bye";
        default:
            return "Invalid remainder";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = isset($_POST['number']) ? $_POST['number'] : '';
    if ($input !== '') {
        $result = checkRemainder($input);
        echo "<p>Input: $input => Result: $result</p>";
    }
}

?>

</body>
</html>