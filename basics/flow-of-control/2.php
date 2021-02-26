<?php

//todo print if number is positive or negative

do {
    $readline = readline('Enter a number: ');
    if (preg_match('/^-?[\d]*$/', $readline)) {
        $number = $readline;
    } else {
        echo "Your input is not valid. Try again!\n";
    }
} while (!isset($number));

if ($number < 0) {
    echo "The number $number is negative";
} elseif ($number > 0) {
    echo "The number $number is positive";
} else {
    echo "The number $number is neutral";
}