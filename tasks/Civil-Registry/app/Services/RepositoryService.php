<?php
declare(strict_types=1);

namespace Registry\App\Services;

use Registry\App\Models\Person;
use Registry\App\Repositories\PersonsRepository;

class RepositoryService
{
    private PersonsRepository $db;

    public function __construct(PersonsRepository $repository)
    {
        $this->db = $repository;
    }

    /**
     * @return Person[]
     */
    public function getAll(): array
    {
        return $this->db->getAll();
    }

    /**
     * @param string $code
     * @return Person[]
     */
    public function getByCode(string $code): array
    {
        return $this->db->getByCode($code);
    }

    /**
     * @param string $name
     * @return Person[]
     */
    public function getByName(string $name): array
    {
        return $this->db->getByName($name);
    }

    /**
     * @param string $surname
     * @return Person[]
     */
    public function getBySurname(string $surname): array
    {
        return $this->db->getBySurname($surname);
    }

    public function getByGender(string $gender): array
    {
        return $this->db->getByGender($gender);
    }

    public function getByYear(string $year): array
    {
        return $this->db->getByYear($year);
    }

    public function getByAddress(string $address): array
    {
        return $this->db->getByAddress($address);
    }

    public function addPerson(Person $person): void
    {
        $this->db->addPerson($person);
    }

    public function deletePerson(Person $person): void
    {
        $this->db->deletePerson($person);
    }

    public function editNote(Person $person): void
    {
        $this->db->editNote($person);
    }

    public function editAddress(Person $person): void
    {
        $this->db->editAddress($person);
    }
}