<?php
/*## Exercise #3

Write a program that reads an positive integer and count the number of digits the number has.*/

do {
    $readline = readline('Enter a positive number: ');
    if (ctype_digit($readline)) {
        $number = $readline;
    } else {
        echo "Your input is not valid. Try again!\n";
    }
} while (!isset($number));

echo "The number $number has " . strlen($number) . " digits";// 0123456789 --> 10

// echo "The number $number has " . strlen(intval($number)) . " digits";// 0123456789 --> 9