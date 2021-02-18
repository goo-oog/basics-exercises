<?php
//# Exercise #10
//todo:
// Design a Geometry class with the following methods:
// - A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//   - Area = π * r * 2
//      - Use Math.PI for π and r for the radius of the circle
// - A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
//   Use the following formula:
//   - Area = Length x Width
// - A static method that accepts the length of a triangle’s base and the triangle’s height.
// The method should return the area of the triangle. Use the following formula:
//   - Area = Base x Height x 0.5
// The methods should display an error message if negative values are used for the circle’s radius,
// the rectangle’s length or width, or the triangle’s base or height.
// Next write a program to test the class, which displays the following menu and responds to the user’s selection:

// ```
// Geometry calculator:
//
// Calculate the Area of a Circle
// Calculate the Area of a Rectangle
// Calculate the Area of a Triangle
// Quit
// Enter your choice (1-4):
// ```
//
// Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.

function getInput(string $prompt, string $pattern = '/^[\d]+\.?([\d]+)?$/'): float
{
    do {
        $isInputValid = false;
        $readine = readline($prompt);
        if (preg_match($pattern, $readine)) {
            $input = $readine;
            $isInputValid = true;
        } else {
            echo 'Your input is not valid, try again! ';
        }
    } while (!$isInputValid);
    return $input;
}

function circleArea(): float
{
    $radius = getInput('Enter the radius of circle : ');
    return pi() * $radius ** 2;
}

function rectangleArea(): float
{
    $height = getInput('Enter the height of rectangle : ');
    $width = getInput('Enter the width of rectangle : ');
    return $height * $width;
}

function triangleArea(): float
{
    $base = getInput('Enter the base of equilateral triangle : ');
    $height = getInput('Enter the height of equilateral triangle : ');
    return $base * $height * 0.5;
}

echo "\nGeometry calculator:\n\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of an Equilateral Triangle\n";
echo "4. Quit\n\n";

$choice = getInput('Enter your choice (1-4) : ', '/^[1-4]{1}$/');
switch ($choice) {
    case 1:
        echo sprintf('The area of circle is %0.2F', circleArea());
        break;
    case 2:
        echo sprintf('The area of rectangle is %0.2F', rectangleArea());
        break;
    case 3:
        echo sprintf('The area of equilateral triangle is %0.2F', triangleArea());
        break;
    case 4:
        echo 'Bye!';
}
echo "\n";