<?php
declare(strict_types=1);

namespace RPSLS\Tests;

use RPSLS\App\Computer;
use RPSLS\App\Paper;
use RPSLS\App\Rock;
use PHPUnit\Framework\TestCase;

class ComputerTest extends TestCase
{
    public function testChoice(): void
    {
        $computer = new Computer(new Rock());
        self::assertInstanceOf(Rock::class, $computer->choice());
    }

    public function testSetChoice(): void
    {
        $computer = new Computer(new Rock());
        $computer->setChoice(new Paper());
        self::assertInstanceOf(Paper::class, $computer->choice());
    }

    public function testName(): void
    {
        $computer = new Computer(new Rock());
        self::assertIsString($computer->name(), 'Computer');
    }

    public function test__construct(): void
    {
        $computer = new Computer(new Rock());
        self::assertInstanceOf(Rock::class, $computer->choice());
    }
}
