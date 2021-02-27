<?php

require_once('Element.php');
require_once('Game.php');

function displayReels(array $reels, int $money = 0, int $bet = 0, int $freeSpins = 0, int $won = 0): void
{
    echo "\033[2J";
    echo "   +---------------------------------+\n";
    echo "   |            Lucky 777            |\n";
    echo "   +---------------------------------+\n\n";
    echo "        Deposit: $money     Bet: $bet\n\n";
    $separator = "        +-----+  +-----+  +-----+\n";
    echo $separator;
    echo "        |  " . $reels[0]->symbol . "  |  |  " . $reels[1]->symbol . "  |  |  " . $reels[2]->symbol . "  |\n";
    echo $separator;
    usleep(250000);
    echo $separator;
    echo "        |  " . $reels[3]->symbol . "  |  |  " . $reels[4]->symbol . "  |  |  " . $reels[5]->symbol . "  |\n";
    echo $separator;
    usleep(250000);
    echo $separator;
    echo "        |  " . $reels[6]->symbol . "  |  |  " . $reels[7]->symbol . "  |  |  " . $reels[8]->symbol . "  |\n";
    echo $separator;
    echo "\n";
    echo "        Free spins: $freeSpins     Won: $won\n\n";
}

$elements[] = new Element('-', 2);
$elements[] = new Element('-', 2);
$elements[] = new Element('-', 2);
$elements[] = new Element('*', 2);
$elements[] = new Element('*', 2);
$elements[] = new Element('*', 2);
$elements[] = new Element('X', 5);
$elements[] = new Element('X', 5);
$elements[] = new Element('#', 5);
$elements[] = new Element('#', 5);
$elements[] = new Element('7', 20);
$reels = array_fill(0, 9, $elements[count($elements) - 1]);
$game = new Game();
$money = 0;
$freeSpins = 0;
$won = 0;
displayReels($reels);
$money += $game->deposit();
$bet = $game->changeBet($money);
do {
    if ($freeSpins == 0) {
        $money -= $bet;
    } else {
        $freeSpins--;
    }
    $game->spin($reels, $elements);
    $won = $bet * $game->getWinMultiplier($reels, $freeSpins);
    $money += $won;
    displayReels($reels, $money, $bet, $freeSpins, $won);
    if ($money > 0) {
        $continue = $game->userInput('Press "enter" to spin again or enter "0" to exit: ', 'playAgain');
    } else {
        echo "Out of money!\n";
        $money += $game->deposit();
    }
    while ($bet > $money) {
        echo "Your bet is larger than your deposit\n";
        $bet = $game->changeBet($money);
    }
} while ($continue == 1);