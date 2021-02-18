<?php
//# Exercise #2
//todo:
// Write a program called CheckOddEven which prints "Odd number" if the int variable “number” is odd,
// or “Even number” otherwise. The program shall always print “bye!” before exiting.

echo "\nLet's check if the number is even or odd!\n";

do {
    $isInputValid = false;
    $readine = readline('Enter a number: ');
    if (preg_match('/^([-]{1})?[\d]+$/', $readine)) {
        $number = $readine;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

echo $number % 2 == 0 ? 'Even number' : 'Odd number';
echo "\nbye!\n";