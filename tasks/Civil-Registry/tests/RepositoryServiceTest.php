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
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis'));
        self::assertInstanceOf(Person::class, $db->getByCode('12345612345')[0]);
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetAll(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis'));
        self::assertIsArray($db->getAll());
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetBySurname(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis'));
        self::assertIsString($db->getBySurname('Bērziņš')[0]->surname(), 'Bērziņš');
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testGetByName(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis'));
        self::assertIsString($db->getByName('Jānis')[0]->surname(), 'Jānis');
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }

    public function testEditNote(): void
    {
        $db = new RepositoryService(new $this->repository());
        $db->addPerson(new Person('12345612345', 'Jānis', 'Bērziņš'));
        $db->editNote(new Person('12345612345', 'Jānis', 'Bērziņš', 'vīrietis'));
        self::assertIsString($db->getByCode('12345612345')[0]->note(), 'vīrietis');
        $db->deletePerson($db->getByCode('12345612345')[0]);
    }
}