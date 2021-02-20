<?php
//### Exercise #5
//Code an interactive, two-player game of Tic-Tac-Toe.

function display_board(array $board): void
{
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
        $readline = readline("$player your location: ");

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
                return $board[$line[0]] === 'X' ? 'The win is yours!' : 'Computer wins!';
            }
            return $board[$line[0]] === 'X' ? 'Player 1 wins!' : 'Player 2 wins!';
        }
    }
    return '-';
}

$board = array_fill(0, 9, ' ');
$winner = '-';
echo "\nTic - Tac - Toe\n\n";
echo "Please choose game mode.\n\nPlayer 1 against player 2 (p)\nPlayer against computer   (c)\n\n";
$gameMode = chooseGameMode();
echo "\nLocation must be entered as xy or yx (a1 or 1a)\n";
display_board($board);
while ($winner === '-') {
    if ($gameMode === 'p') {
        $board[userMove($board, 'Player 1, choose')] = "X";
    } else {
        $board[userMove($board, 'Choose')] = "X";
    }
    display_board($board);
    $winner = checkWinner($board, $gameMode);
    if (!in_array(' ', $board) && $winner === '-') {
        $winner = 'Tie!';
        break;
    }
    if ($winner === '-') {
        if ($gameMode === 'p') {
            $board[userMove($board, 'Player 2, choose')] = "O";

        } else {
            $board[computerMove($board)] = "O";
        }
    }
    $winner = checkWinner($board, $gameMode);
    display_board($board);
}
echo $winner;