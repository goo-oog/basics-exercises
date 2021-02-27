<?php

class Game
{
    function userInput(string $prompt, string $type, int $money = 0): int
    {
        do {
            $readline = readline($prompt);
            switch ($type) {
                case 'deposit':
                    if (is_numeric($readline) && $readline % 10 == 0) {
                        if ($readline == '0') {
                            exit();
                        }
                        return $readline;
                    }
                    break;
                case 'bet':
                    if (is_numeric($readline) && $readline % 10 == 0 && $readline <= $money) {
                        if ($readline == '0') {
                            exit();
                        }
                        return $readline;
                    }
                    break;
                case 'playAgain':
                    if ($readline == '0') {
                        exit();
                    } else {
                        return 1;
                    }
            }
        } while (1);
    }

    public function spin(array &$reels, array $elements): void
    {
        for ($i = 0; $i < 9; $i++) {
            $reels[$i] = $elements[rand(0, count($elements) - 1)];
        }
    }

    public function getWinMultiplier(array $reels, int &$freeSpins): int
    {
        $winLines = [[0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 4, 8], [2, 4, 6]];
        $winMultiplier = 0;
        foreach ($winLines as $line) {
            if ($reels[$line[0]]->symbol === $reels[$line[1]]->symbol && $reels[$line[1]]->symbol === $reels[$line[2]]->symbol) {
                $winMultiplier += $reels[$line[0]]->winMultiplier;
                if ($reels[$line[0]]->symbol === '7') {
                    $freeSpins += 5;
                }
            }
        }
        return $winMultiplier;
    }

    public function deposit(): int
    {
        return $this->userInput('Enter the sum you are willing to deposit (in increment of 10 coins) or "0" to exit: ', 'deposit');
    }

    public function changeBet(int $money): int
    {
        return $this->userInput('Enter the bet size (in increment of 10 coins) or "0" to exit: ', 'bet', $money);
    }
}