<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use PDO;
use Registry\App\Models\Person;
use Registry\App\Services\MySQLService;

class MySQLPersonsRepository implements PersonsRepository
{
    private MySQLService $mySQL;

    public function __construct(MySQLService $mySQLService)
    {
        $this->mySQL = $mySQLService;
    }

    /**
     * @param string $subject
     * @param string $value
     * @param string $orderBy
     * @return Person[]
     */
    public function search(string $subject, string $value, string $orderBy): array
    {
        $stmt = $this->mySQL->pdo()->prepare("SELECT * FROM persons WHERE $subject LIKE :value ORDER BY $orderBy");
        $stmt->execute(['value' => $value]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    public function addPerson(Person $person): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO persons (code, name, surname, gender, year, address, note) VALUES (?,?,?,?,?,?,?)')
            ->execute([$person->code(), $person->name(), $person->surname(), $person->gender(), $person->year(), $person->address(), $person->note()]);
    }

    public function deletePerson(Person $person): void
    {
        $this->mySQL->pdo()->prepare("DELETE FROM persons WHERE code='{$person->code()}'")->execute();
    }

    public function editNote(Person $person): void
    {
        $this->mySQL->pdo()->prepare("UPDATE persons SET note='{$person->note()}' WHERE code='{$person->code()}'")->execute();
    }

    public function editAddress(Person $person): void
    {
        $this->mySQL->pdo()->prepare("UPDATE persons SET address='{$person->address()}' WHERE code='{$person->code()}'")->execute();
    }
}
