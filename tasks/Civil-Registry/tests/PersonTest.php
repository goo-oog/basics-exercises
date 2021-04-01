<?php
declare(strict_types=1);

namespace Registry\Tests;

use Registry\App\Models\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    public function testName(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956');
        self::assertEquals('Jānis', $person->name());
    }

    public function testNote(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956', '', 'Test');
        self::assertEquals('Test', $person->note());
    }

    public function testSurname(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956');
        self::assertEquals('Bērziņš', $person->surname());
    }

    public function testCode(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956');
        self::assertEquals('12345612345', $person->code());
    }

    public function testGender(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956');
        self::assertEquals('M', $person->gender());
    }

    public function testYear(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956');
        self::assertEquals('1956', $person->year());
    }

    public function testAddress(): void
    {
        $person = new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956', 'Rīga');
        self::assertEquals('Rīga', $person->address());
    }
}