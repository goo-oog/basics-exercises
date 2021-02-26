<?php
## Exercise #4

/*Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6, respectively.
Otherwise, it shall print "Not a valid day".
Use:
- a "nested-if" statement
- a "switch-case-default" statement.*/

do {
    $readLine = readline('Enter number of day (0-6): ');
    if (ctype_digit($readLine)) {
        $dayNumber = $readLine;
        switch ($dayNumber) {
            case 0:
                echo "Sunday";
                break;
            case 1:
                echo "Monday";
                break;
            case 2:
                echo "Tuesday";
                break;
            case 3:
                echo "Wednesday";
                break;
            case 4:
                echo "Thursday";
                break;
            case 5:
                echo "Friday";
                break;
            case 6:
                echo "Saturday";
                break;
            default:
                echo "Not a valid day!";
        }
    } else {
        echo "Your input is not valid. Try again!\n";
    }
} while (!isset($dayNumber));