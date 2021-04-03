<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use Registry\App\Models\Person;

interface PersonsRepository
{
    /**
     * @param string $subject
     * @param string $value
     * @param string $orderBy
     * @return Person[]
     */
    public function search(string $subject, string $value, string $orderBy): array;

    public function addPerson(Person $person): void;

    public function deletePerson(Person $person): void;

    public function editNote(Person $person): void;

    public function editAddress(Person $person): void;
}