<?php
declare(strict_types=1);

namespace Racing;
require_once 'Racer.php';
require_once 'RacerGeneral.php';
require_once 'Biker.php';
require_once 'Donkey.php';
require_once 'Runner.php';
require_once 'RacerCollection.php';

$trackLength = 80;

$racers = new RacerCollection();
$racers->addRacer(new Biker('1'));
$racers->addRacer(new Biker('2'));
$racers->addRacer(new Donkey());
$racers->addRacer(new Runner('1'));
$racers->addRacer(new Runner('2'));
$racers->addRacer(new RacerGeneral('Car', 5, 10, 0.04, '╬'));

$startTime = microtime(true);
$nextWinningPlace = 1;

echo "\e[?25l"; // disable cursor
do {
    $winsThisTick = 0;
    echo "\033[2J"; // clear screen
    echo "\n\n\n\n";
    foreach ($racers->racers() as $racer) {
        if ($racer->winningPlace() === 0) {
            if (rand(0, 1000) < $racer->crashRate() * 1000) {
                $racer->crash();
            } else {
                $racer->move();
                if ($racer->position() >= $trackLength) {
                    $racer->setPosition($trackLength); // to be sure to stop at finish line
                    $racer->setWinningPlace($nextWinningPlace);
                    $racer->setTime(microtime(true) - $startTime);
                    $winsThisTick++;
                }
            }
        }
        echo ' ' . $racer->name()
            . str_repeat(' ', 10 - strlen($racer->name()))
            . str_repeat('═', $racer->position())
            . $racer->symbol()
            . str_repeat('═', $trackLength - $racer->position())
            . ($racer->winningPlace() > 0 ? '  Time: ' . sprintf('%0.2f s', $racer->time()) . '  Place : ' . $racer->winningPlace() : '')
            . ($racer->winningPlace() < 0 ? '  CRASHED' : '')
            . "\n\n";
    }
    usleep(100000);
    $nextWinningPlace += $winsThisTick;
} while ($racers->isSomebodyStillRacing());
echo "\e[?25h"; // enable cursor