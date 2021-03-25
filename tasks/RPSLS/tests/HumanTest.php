<?php
declare(strict_types=1);

namespace RPSLS\Tests;

use RPSLS\App\Human;
use RPSLS\App\Paper;
use RPSLS\App\Rock;
use PHPUnit\Framework\TestCase;

class HumanTest extends TestCase
{
    public function testSetChoice(): void
    {
        $human = new Human(new Rock());
        $human->setChoice(new Paper());
        self::assertInstanceOf(Paper::class, $human->choice());
    }

    public function test__construct(): void
    {
        $human = new Human(new Rock());
        self::assertInstanceOf(Rock::class, $human->choice());
    }

    public function testName(): void
    {
        $human = new Human(new Rock());
        self::assertIsString($human->name(), 'You');
    }

    public function testChoice(): void
    {
        $human = new Human(new Rock());
        self::assertInstanceOf(Rock::class, $human->choice());
    }
}
