<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use Registry\App\Models\Person;

interface PersonsRepository
{
    /**
     * @return Person[]
     */
    public function getAll(): array;

    /**
     * @param string $code
     * @return Person[]
     */
    public function getByCode(string $code): array;

    /**
     * @param string $name
     * @return Person[]
     */
    public function getByName(string $name): array;

    /**
     * @param string $surname
     * @return Person[]
     */
    public function getBySurname(string $surname): array;

    /**
     * @param string $gender
     * @return Person[]
     */
    public function getByGender(string $gender): array;

    /**
     * @param string $year
     * @return Person[]
     */
    public function getByYear(string $year): array;

    /**
     * @param string $address
     * @return Person[]
     */
    public function getByAddress(string $address): array;

    public function addPerson(Person $person): void;

    public function deletePerson(Person $person): void;

    public function editNote(Person $person): void;

    public function editAddress(Person $person): void;
}