<?php
//# Exercise #1
//todo:
// Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

echo "\nProgram returns true if either of two integers is 15 or if their sum or difference is 15.\n";

function getInput(string $prompt): int
{
    do {
        $isInputValid = false;
        $readine = readline($prompt);
        if (preg_match('/^([-]{1})?[\d]+$/', $readine)) {
            $input = $readine;
            $isInputValid = true;
        } else {
            echo 'Your input is not valid, try again! ';
        }
    } while (!$isInputValid);
    return $input;
}

$integer1 = getInput('Enter the 1st integer: ');
$integer2 = getInput('Enter the 2nd integer: ');

echo $integer1 == 15 || $integer2 == 15 || $integer1 + $integer2 == 15 || abs($integer1 - $integer2) == 15 ? 'true' : 'false';
echo "\n";