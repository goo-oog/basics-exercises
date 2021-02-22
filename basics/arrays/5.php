<?php
//### Exercise #5
//Code an interactive, two-player game of Tic-Tac-Toe.

function colorize(string $xo): string
{
    if ($xo === 'X') {
        return "\x1B[1;92mX\x1B[0m";
    } elseif ($xo === 'O') {
        return "\x1B[1;91mO\x1B[0m";
    }
    return $xo;
}

function display_board(array $board): void
{
    $board = array_map('colorize', $board);
    echo "\n        a   b   c\n\n";
    echo "    1   $board[0] | $board[1] | $board[2] \n";
    echo "       ---+---+---\n";
    echo "    2   $board[3] | $board[4] | $board[5] \n";
    echo "       ---+---+---\n";
    echo "    3   $board[6] | $board[7] | $board[8] \n\n";
}

function chooseGameMode(): string
{
    do {
        $isInputValid = false;
        $readline = readline('Enter your choice: ');
        if (preg_match('/^[cp]$/', $readline)) {
            $mode = $readline;
            $isInputValid = true;
        } else {
            echo 'Your input is not valid, try again! ';
        }
    } while (!$isInputValid);
    return $mode;
}

function userMove(array $board, string $player): int
{
    do {
        $isInputValid = false;
        echo $player;
        $readline = readline(', choose your location: ');

        if (preg_match('/^[a-c]{1}[1-3]{1}$/', $readline)) {
            $location = ord($readline[0]) - 97 + 3 * ($readline[1] - 1);
        } elseif (preg_match('/^[1-3]{1}[a-c]{1}$/', $readline)) {
            $location = ord($readline[1]) - 97 + 3 * ($readline[0] - 1);
        } else {
            echo 'Your input is not valid, try again! ';
        }
        if (isset($location) && $board[$location] === ' ') {
            $isInputValid = true;
        } else {
            echo 'That tile is already taken, try again! ';
        }
    } while (!$isInputValid);
    return $location;
}

function computerMove(array $board): int
{
    $freeTiles = array_keys($board, ' ');
    return $freeTiles[array_rand($freeTiles)];
}

function checkWinner(array $board, string $gameMode): string
{
    $winLines = [[0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6]];
    foreach ($winLines as $line) {
        if ($board[$line[0]] !== ' ' && $board[$line[0]] === $board[$line[1]] && $board[$line[1]] === $board[$line[2]]) {
            if ($gameMode === 'c') {
                return $board[$line[0]] === 'X' ? "\x1B[1;92mThe win is yours!\x1B[0m" : "\x1B[1;91mComputer wins!\x1B[0m";
            }
            return $board[$line[0]] === 'X' ? "\x1B[1;92mPlayer 1 wins!\x1B[0m" : "\x1B[1;91mPlayer 2 wins!\x1B[0m";
        }
    }
    return '-';
}

$board = array_fill(0, 9, ' ');
$winner = '-';
echo "\n   \x1B[1;44;37m  Tic - Tac - Toe  \x1B[0m\n\n";
echo "Please choose the game mode.\n\nPlayer 1 against player 2 \x1B[1;43;30m p \x1B[0m\n\nPlayer against computer   \x1B[1;43;30m c \x1B[0m\n\n";
$gameMode = chooseGameMode();
echo "\nLocation must be entered as xy or yx (a1 or 1a)\n";
display_board($board);
while ($winner === '-') {
    if ($gameMode === 'p') {
        $board[userMove($board, "\x1B[1;92mPlayer 1\x1B[0m")] = "X";
    } else {
        $board[userMove($board, "\x1B[1;92mPlayer\x1B[0m")] = "X";
    }
    display_board($board);
    $winner = checkWinner($board, $gameMode);
    if (!in_array(' ', $board) && $winner === '-') {
        $winner = "\x1B[1;94mTie!\x1B[0m";
        break;
    }
    if ($winner === '-') {
        if ($gameMode === 'p') {
            $board[userMove($board, "\x1B[1;91mPlayer 2\x1B[0m")] = "O";

        } else {
            $board[computerMove($board)] = "O";
        }
    }
    $winner = checkWinner($board, $gameMode);
    display_board($board);
}
echo $winner . "\n";