<?php
# Exercise #9
//todo:
// Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: ```BMI = weight x 703 / height ^ 2```.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.
// Your program must accept metric units.

echo "\nProgram calculates your body mass index (BMI)\n\n";

function getInput(string $prompt): int
{
    do {
        $isInputValid = false;
        $readine = readline($prompt);
        if (preg_match('/^[1-9]([\d]+)?$/', $readine)) {
            $input = $readine;
            $isInputValid = true;
        } else {
            echo 'Your input is not valid, try again! ';
        }
    } while (!$isInputValid);
    return $input;
}

$weight = getInput('Enter your weight in kilograms (kg): ');
$height = getInput('Enter your height in centimeters (cm): ');

$BMI = $weight / (($height * .01) ** 2); //metric variant of formula

echo sprintf('Your body mass index (BMI) is %0.1F and ', $BMI);
if ($BMI < 18.5) {
    echo 'person with such is considered underweight.';
} elseif ($BMI > 25) {
    echo 'person with such is considered overweight.';
} else {
    echo 'is considered optimal.';
}
echo "\n";