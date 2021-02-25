<?php
/*## Exercise #8

Write a console program in a class named NumberSquare that prompts the user for two integers,
a min and a max, and prints the numbers in the range from min to max inclusive in a square pattern.
Each line of the square consists of a wrapping sequence of integers increasing from min and max.
The first line begins with min, the second line begins with min + 1, and so on.
When the sequence in any line reaches max, it wraps around back to min.
You may assume that min is less than or equal to max. Here is an example dialogue:

```
Min? 1
Max? 5
12345
23451
34512
45123
51234
```*/

class NumberSquare
{
    private int $min;
    private int $max;
    private array $numbers;

    public function __construct()
    {
        $this->min = $this->getNumber('Enter the MIN number (0-8): ', 0, 8);
        $this->max = $this->getNumber("Enter the MAX number (" . (1 + $this->min) . "-9): ", 1 + $this->min, 9);
        for ($i = $this->min; $i <= $this->max; $i++) {
            $this->numbers[] = $i;
        }
    }

    private function getNumber(string $prompt, int $min, int $max): int
    {
        do {
            $readline = readline($prompt);
            if (ctype_digit($readline) && $readline >= $min && $readline <= $max) {
                return $readline;
            } else {
                echo "Your input is not valid. Try again!\n";
            }
        } while (1);
    }

    public function getPermutations(): string
    {
        $outputString = '';
        for ($i = 0; $i < count($this->numbers); $i++) {
            $outputString .= implode('', $this->numbers) . "\n";
            $this->numbers[] = $this->numbers[0];
            array_shift($this->numbers);
        }
        return $outputString;
    }
}

$permutator = new NumberSquare;
echo $permutator->getPermutations();