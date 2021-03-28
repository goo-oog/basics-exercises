<?php
declare(strict_types=1);

namespace Registry\Tests;

use Registry\App\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    public function testName(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis');
        self::assertIsString($person->name(), 'Jānis');
    }

    public function testNote(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis');
        self::assertIsString($person->note(), 'vīrietis');
    }

    public function testSurname(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis');
        self::assertIsString($person->surname(), 'Bērziņš');
    }

    public function testCode(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis');
        self::assertIsString($person->code(), '12345612345');
    }
}
