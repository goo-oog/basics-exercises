<?php
$options = ['r', 'p', 's', 'rock', 'paper', 'scissors'];
echo 'Enter rock(r), paper(p) or scissors(s):';
do {
    $isInputValid = false;
    $readine = readline('>> ');
    if (ctype_alpha($readine) && in_array(strtolower($readine), $options)) {
        $user = substr($readine, 0, 1);
        $isInputValid = true;
    }
} while (!$isInputValid);

$computer = $options[rand(0, 2)];
echo "You: " . $options[array_search($user, $options) + 3] . "  Computer: " . $options[array_search($computer, $options) + 3];
switch ([$user, $computer]) {
    case ['r', 's']:
    case ['p', 'r']:
    case ['s', 'p']:
        echo "\nYou win!\n";
        break;
    case ['r', 'p']:
    case ['p', 's']:
    case ['s', 'r']:
        echo "\nComputer wins!\n";
        break;
    default:
        echo "\nTie!\n";
}