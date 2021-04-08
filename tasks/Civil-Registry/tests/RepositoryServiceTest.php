<?php
declare(strict_types=1);

namespace Registry\Tests;

use Registry\App\Models\Person;
use Registry\App\Repositories\MySQLPersonsRepository;
use Registry\App\Services\PersonsRepositoryService;
use PHPUnit\Framework\TestCase;

class RepositoryServiceTest extends TestCase
{
    private string $repository = MySQLPersonsRepository::class;

    public function testAddPerson_getByCode_deletePerson(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertInstanceOf(Person::class, $db->getByCode('12345612345')[0]);
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetAll(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertIsArray($db->getAll());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetBySurname(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertEquals('Bērziņš', $db->getBySurname('Bērziņš')[0]->surname());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByName(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertEquals('Jānis', $db->getByName('Jānis')[0]->name());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByGender(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertEquals('M', $db->getByName('Jānis')[0]->gender());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByYear(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        self::assertEquals('1956', $db->getByYear('1956')[0]->year());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testEditNote(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        $db->editNote(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956', '', 'Test'));
        self::assertEquals('Test', $db->getByCode('12345612345')[0]->note());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testEditAddress(): void
    {
        $db = new PersonsRepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956'));
        $db->editAddress(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '1956', 'Rīga'));
        self::assertEquals('Rīga', $db->getByCode('12345612345')[0]->address());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }
}