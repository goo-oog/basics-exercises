<?php
/*# Exercise #5

On your phone keypad, the alphabets are mapped to digits as follows: ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).
Write a program called PhoneKeyPad, which prompts user for a String (case insensitive), and converts to a sequence of keypad digits.
Use:
- a "nested-if" statement
- a "switch-case-default" statement
Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,*/

$phoneNumber = '';
do {
    $readLine = readline('Enter a string: ');
    if (ctype_alnum($readLine)) {
        $stringToConvert = strtoupper($readLine);
        for ($i = 0; $i < strlen($stringToConvert); $i++) {
            switch (true) {
                case in_array($stringToConvert[$i], ['A', 'B', 'C']):
                    $phoneNumber .= '2';
                    break;
                case in_array($stringToConvert[$i], ['D', 'E', 'F']):
                    $phoneNumber .= '3';
                    break;
                case in_array($stringToConvert[$i], ['G', 'H', 'I']):
                    $phoneNumber .= '4';
                    break;
                case in_array($stringToConvert[$i], ['J', 'K', 'L']):
                    $phoneNumber .= '5';
                    break;
                case in_array($stringToConvert[$i], ['M', 'N', 'O']):
                    $phoneNumber .= '6';
                    break;
                case in_array($stringToConvert[$i], ['P', 'Q', 'R', 'S']):
                    $phoneNumber .= '7';
                    break;
                case in_array($stringToConvert[$i], ['T', 'U', 'V']):
                    $phoneNumber .= '8';
                    break;
                case in_array($stringToConvert[$i], ['W', 'X', 'Y', 'Z']):
                    $phoneNumber .= '9';
                    break;
                default:
                    $phoneNumber .= $stringToConvert[$i];
            }
        }
    } else {
        echo "Enter only letters and numbers. Try again!\n";
    }
} while (!isset($stringToConvert));
echo $phoneNumber;