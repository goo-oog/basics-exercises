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
        return $this->db->search('code', '', 'surname,name');
    }

    /**
     * @param string $code
     * @return Person[]
     */
    public function getByCode(string $code): array
    {
        $code = str_replace('-', '', $code);
        return $this->db->search('code', $code, 'code');
    }

    /**
     * @param string $name
     * @return Person[]
     */
    public function getByName(string $name): array
    {
        return $this->db->search('name', $name, 'name,surname');
    }

    /**
     * @param string $surname
     * @return Person[]
     */
    public function getBySurname(string $surname): array
    {
        return $this->db->search('surname', $surname, 'surname,name');
    }

    /**
     * @param string $gender
     * @return Person[]
     */
    public function getByGender(string $gender): array
    {
        return $this->db->search('gender', $gender, 'gender,surname,name');
    }

    /**
     * @param string $year
     * @return Person[]
     */
    public function getByYear(string $year): array
    {
        return $this->db->search('year', $year, 'year,surname,name');
    }

    /**
     * @param string $address
     * @return Person[]
     */
    public function getByAddress(string $address): array
    {
        return $this->db->search('address', $address, 'address,surname,name');
    }

    /**
     * @param string $note
     * @return Person[]
     */
    public function getByNote(string $note): array
    {
        return $this->db->search('note', $note, 'surname,name');
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