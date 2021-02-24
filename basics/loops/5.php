<?php
//## Exercise #5
//
// P I G L E T
//

echo "\nWelcome to PIGLET!\n";
$points = 0;
do {
    $dice = rand(1, 6);
    echo "\nYou rolled a $dice ";
    if ($dice == 1) {
        $points = 0;
        break;
    }
    $points += $dice;
    echo "and your total points are $points\n";
    $userChoice = readline('Input "s" to STOP or anything else to roll again: ');
} while ($userChoice != 's');
echo "\nYou got $points points\n";