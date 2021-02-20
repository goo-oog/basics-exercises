<?php
//# Exercise #3
//todo:
// Write a program to produce the sum of 1, 2, 3, ..., to 100.
// Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily.
// Also compute and display the average. The output shall look like:
// ```
// The sum of 1 to 100 is 5050
// The average is 50.5
// ```

echo "\nProgram calculates sum and average of all numbers between Min and Max (inclusive).\n";

do {
    $isInputValid = false;
    $readline = readline('Enter the Min number: ');
    if (preg_match('/^([-]{1})?[\d]+$/', $readline)) {
        $min = $readline;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

do {
    $isInputValid = false;
    $readline = readline('Enter the Max number that is bigger than the Min number: ');
    if (preg_match('/^([-]{1})?[\d]+$/', $readline) && $readline > $min) {
        $max = $readline;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

for ($i = $min; $i <= $max; $i++) {
    $sum += $i;
}
$average = $sum / ($max - $min + 1);

echo "The sum of $min to $max is $sum\n";
echo "The average is $average\n";