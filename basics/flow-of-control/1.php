<?php

//echo "Input the 1st number: ";
//echo "Input the 2nd number: ";
//echo "Input the 3rd number: ";
//todo print the largest number

function getNumber(string $prompt): int
{
    do {
        $readline = readline("Enter the $prompt number: ");
        if (ctype_digit($readline)) {
            return $readline;
        } else {
            echo "Your input is not valid. Try again!\n";
        }
    } while (1);
}

$numbers[] = getNumber('1st');
$numbers[] = getNumber('2nd');
$numbers[] = getNumber('3rd');
echo "The largest number of ($numbers[0], $numbers[1], $numbers[2]) is " . max($numbers);
