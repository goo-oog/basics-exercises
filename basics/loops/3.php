<?php
## Exercise #3

//Write a program that asks the user to enter two words. The program then prints out both words on one line.
//The words will be separated by enough dots so that the total line length is 30:
//
//```
//Enter first word:
//turtle
//Enter second word
//153
//turtle....................153
//```
//
//This could be used as part of an index for a book. To print out the dots, use `echo "."` inside a loop body.


$word1 = getInput('Enter the first word (1-28 characters long): ',
    '/^[a-zA-Z\d]{1,28}$/');

$word2 = getInput("Enter the second word (1-" . (29 - strlen($word1)) . " characters long): ",
    '/^[a-zA-Z\d]{1,' . (29 - strlen($word1)) . '}$/');

$dots = '';
for ($i = 1; $i <= 30 - strlen($word1) - strlen($word2); $i++) {
    $dots .= '.';
}
echo "\n$word1$dots$word2\n";

function getInput(string $prompt, string $pattern): string
{
    do {
        $readline = readline($prompt);
        if (preg_match($pattern, $readline)) {
            return $readline;
        } else {
            echo "Your input is not valid. Try again!\n";
        }
    } while (1);
}