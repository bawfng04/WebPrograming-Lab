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
echo "input: " . 5 . " => " . checkRemainder(5) . "<br>";
echo "input: " . 6 . " => " . checkRemainder(6) . "<br>";
echo "input: " . 7 . " => " . checkRemainder(7) . "<br>";
echo "input: " . 8 . " => " . checkRemainder(8) . "<br>";
echo "input: " . 9 . " => " . checkRemainder(9) . "<br>";
echo "input: " . 10 . " => " . checkRemainder(10) . "<br>";
?>