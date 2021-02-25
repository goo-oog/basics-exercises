<?php
/*## Exercise #7

Write a console program in a class named *RollTwoDice* that prompts the user for a desired sum,
then repeatedly rolls two six-sided dice (using a Random object to generate
random numbers from 1-6) until the sum of the two dice values is the desired sum.
Here is the expected dialogue with the user:

```
Desired sum: 9
4 and 3 = 7
3 and 5 = 8
5 and 6 = 11
5 and 6 = 11
1 and 5 = 6
6 and 3 = 9
```*/

class RollTwoDice
{
    public function rollDices(): array
    {
        $dice1 = rand(1, 6);
        $dice2 = rand(1, 6);
        return [$dice1, $dice2];
    }

    public function getDesiredSum(): int
    {
        do {
            $readline = readline('Enter the desired sum in a range from 2 to 12: ');
            if (ctype_digit($readline) && $readline >= 2 && $readline <= 12) {
                return $readline;
            } else {
                echo "Your input is not valid. Try again!\n";
            }
        } while (1);
    }
}

$game = new RollTwoDice();
$desiredSum = $game->getDesiredSum();
echo "Desired sum: $desiredSum\n";
do {
    $dices = $game->rollDices();
    echo "$dices[0] and $dices[1] = " . array_sum($dices) . "\n";
} while (array_sum($dices) != $desiredSum);
