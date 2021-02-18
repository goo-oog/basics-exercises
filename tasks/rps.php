<?php
$options = ['r', 'p', 's', 'rock', 'paper', 'scissors'];
echo 'Enter rock(r), paper(p) or scissors(s):';
do {
    $isInputValid = false;
    $readine = readline('>> ');
    if (ctype_alpha($readine) && in_array($readine, $options)) {
        $user = $readine;
        $isInputValid = true;
    }
} while (!$isInputValid);

$computer = $options[rand(0, 2)];
switch ([$user, $computer]) {
    case ['r', 's']:
    case ['p', 'r']:
    case ['s', 'p']:
        echo "You: $user  Computer: $computer\nYou win!\n";
        break;
    case ['r', 'p']:
    case ['p', 's']:
    case ['s', 'r']:
        echo "You: $user  Computer: $computer\nComputer wins!\n";
        break;
    default:
        echo "You: $user  Computer: $computer\nTie!\n";
}