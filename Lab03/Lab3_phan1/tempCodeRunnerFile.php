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

// Test cases
$testNumbers = [5, 6, 7, 8, 9, -1, 3.5];

foreach ($testNumbers as $number) {
    echo "Input: $number, Output: " . checkRemainder($number) . "<br>";
}
?>