<?php
declare(strict_types=1);

namespace RPSLS\Tests;

use RPSLS\App\Computer;
use RPSLS\App\Game;
use RPSLS\App\Human;
use RPSLS\App\Lizard;
use RPSLS\App\Paper;
use RPSLS\App\Rock;
use RPSLS\App\Scissors;
use RPSLS\App\Spock;
use RPSLS\App\Element;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testRock(): void
    {
        $game = new Game('Rock');
        $game->computer()->setChoice(new Paper());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Scissors());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Lizard());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Spock());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Rock());
        self::assertIsString($game->winner(), 'Tie!');
    }

    public function testPaper(): void
    {
        $game = new Game('Paper');
        $game->computer()->setChoice(new Paper());
        self::assertIsString($game->winner(), 'Tie!');
        $game->computer()->setChoice(new Scissors());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Lizard());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Spock());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Rock());
        self::assertIsString($game->winner(), 'You won!');
    }

    public function testScissors(): void
    {
        $game = new Game('Scissors');
        $game->computer()->setChoice(new Paper());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Scissors());
        self::assertIsString($game->winner(), 'Tie!');
        $game->computer()->setChoice(new Lizard());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Spock());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Rock());
        self::assertIsString($game->winner(), 'Computer won!');
    }

    public function testLizard(): void
    {
        $game = new Game('Lizard');
        $game->computer()->setChoice(new Paper());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Scissors());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Lizard());
        self::assertIsString($game->winner(), 'Tie!');
        $game->computer()->setChoice(new Spock());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Rock());
        self::assertIsString($game->winner(), 'Computer won!');
    }

    public function testSpock(): void
    {
        $game = new Game('Lizard');
        $game->computer()->setChoice(new Paper());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Scissors());
        self::assertIsString($game->winner(), 'You won!');
        $game->computer()->setChoice(new Lizard());
        self::assertIsString($game->winner(), 'Computer won!');
        $game->computer()->setChoice(new Spock());
        self::assertIsString($game->winner(), 'Tie!');
        $game->computer()->setChoice(new Rock());
        self::assertIsString($game->winner(), 'You won!');
    }

    public function test__construct(): void
    {
        $game = new Game('Rock');
        self::assertInstanceOf(Human::class, $game->human());
        self::assertInstanceOf(Rock::class, $game->human()->choice());
        self::assertInstanceOf(Computer::class, $game->computer());
        self::assertInstanceOf(Element::class, $game->computer()->choice());
    }

    public function testElements(): void
    {
        $game = new Game('Rock');
        self::assertIsArray($game->elements());
        self::assertCount(5, $game->elements());
    }
}
