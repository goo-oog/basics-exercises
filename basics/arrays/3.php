<?php
### Exercise #3

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "\n";

//todo check if an array contains a value user entered

do {
    $isInputValid = false;
    $readline = readline('Enter the 4-digit number to search for: ');
    if (preg_match('/^[\d]{4}$/', $readline)) {
        $number = $readline;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

echo in_array($number, $numbers) ? 'Value found!' : 'Nothing found.';