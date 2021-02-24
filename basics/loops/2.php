<?php

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function


echo "+-----------------------------------------+\n";
echo "| This program performs an exponentiation |\n";
echo "+-----------------------------------------+\n\n";
echo "Please enter only positive or negative natural numbers, or zero.\n\n";

$base = getInput('Enter the base: ');
$exponent = getInput('Enter the exponent (power): ');
$result = 1;

for ($i = 1; $i <= abs($exponent); $i++) {
    $result *= $base;
}

if ($exponent < 0) {
    if ($base == 0) {
        $result = 'INFINITY (division by zero!)';
    } else {
        $result = 1 / $result;
    }
}

echo "\nResult: $result\n";

function getInput(string $prompt): int
{
    do {
        $readline = readline($prompt);
        if (preg_match('/^-?[\d]*$/', $readline)) {
            return $readline;
        } else {
            echo "Your input is not valid. Try again!\n";
        }
    } while (1);
}