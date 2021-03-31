<?php
declare(strict_types=1);

namespace Registry\Tests;

use Registry\App\Models\Person;
use Registry\App\Repositories\MySQLPersonsRepository;
use Registry\App\Services\RepositoryService;
use PHPUnit\Framework\TestCase;

class RepositoryServiceTest extends TestCase
{
    private string $repository = MySQLPersonsRepository::class;

    public function testAddPerson_getByCode_deletePerson(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        self::assertInstanceOf(Person::class, $db->getByCode('12345612345')[0]);
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetAll(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        self::assertIsArray($db->getAll());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetBySurname(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        self::assertEquals('Bērziņš', $db->getBySurname('Bērziņš')[0]->surname());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByName(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        self::assertEquals('Jānis', $db->getByName('Jānis')[0]->name());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByGender(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        self::assertEquals('M', $db->getByName('Jānis')[0]->gender());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testEditNote(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        $db->editNote(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', '', 'Test'));
        self::assertEquals('Test', $db->getByCode('12345612345')[0]->note());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testEditAddress(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'M'));
        $db->editAddress(new Person('12345612345', 'Jānis', 'Bērziņš', 'M', 'Rīga'));
        self::assertEquals('Rīga', $db->getByCode('12345612345')[0]->address());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }
}