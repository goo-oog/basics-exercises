<?php
//# Exercise #4
//todo:
// Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N.

echo "\nThis program calculates the factorial of an integer.\n";

do {
    $isInputValid = false;
    $readine = readline('Enter a positive integer: ');
    if (preg_match('/^[\d]+$/', $readine)) {
        $number = $readine;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

$factorial = 1;
for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}

echo "Factorial of $number ($number!) is $factorial\n";