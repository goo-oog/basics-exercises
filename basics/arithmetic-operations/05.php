<?php
//# Exercise #5
//todo:
// Write a program that picks a random number from 1-100. Give the user a chance to guess it.
// If they get it right, tell them so. If their guess is higher than the number, say "Too high."
// If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)
// ```
// I'm thinking of a number between 1-100.  Try to guess it.
// > 13
// Sorry, you are too low.  I was thinking of 34.
// ```
// ```
// I'm thinking of a number between 1-100.  Try to guess it.
// > 79
// Sorry, you are too high.  I was thinking of 51.
// ```
// ```
// I'm thinking of a number between 1-100.  Try to guess it.
// > 42
// You guessed it!  What are the odds?!?
// ```

echo "\nI'm thinking of a number between 1-100. Try to guess it.\n";

$random = rand(1, 100);

do {
    $isInputValid = false;
    $readine = readline('Enter a number: ');
    if (preg_match('/^[\d]+$/', $readine) && $readine >= 1 && $readine <= 100) {
        $guess = $readine;
        $isInputValid = true;
    } else {
        echo 'Your input is not valid, try again! ';
    }
} while (!$isInputValid);

if ($random !== $guess) {
    echo $guess > $random ?
        "Sorry, you are too high. I was thinking of $random.\n" :
        "Sorry, you are too low. I was thinking of $random.\n";
} else {
    echo "You guessed it! What are the odds?!?\n";
}