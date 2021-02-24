<?php
//## Exercise #4
//
echo "  +----------------------+\n";
echo "  |  FizzBuzz generator  |\n";
echo "  +----------------------+\n\n";
do {
    $readline = readline('Enter the max value: ');
    if (ctype_digit($readline)) {
        $input = $readline;
    } else {
        echo "Your input is not valid. Try again!\n";
    }
} while (!isset($input));
for ($i = 1; $i <= $input; $i++) {
    $isFizzBuzz = false;
    if ($i % 3 == 0) {
        echo 'Fizz';
        $isFizzBuzz = true;
    }
    if ($i % 5 == 0) {
        echo 'Buzz';
        $isFizzBuzz = true;
    }
    if (!$isFizzBuzz) {
        echo $i;
    }
    echo ' ';
    if ($i % 20 == 0) {
        echo "\n";
    }
}