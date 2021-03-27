<?php
declare(strict_types=1);


namespace Registry\App;


interface Repository
{
    /**
     * @return Person[]
     */
    public function getAll(): array;

    public function getByCode(string $code): Person;

    public function getByName(string $name): Person;

    public function getBySurname(string $surname): Person;

    public function addPerson(Person $person): void;

    public function deletePerson(Person $person): void;

    public function editNote(Person $person): void;
}