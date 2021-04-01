<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use Dotenv\Dotenv;
use PDO;
use PDOException;
use Registry\App\Models\Person;

class MySQLPersonsRepository implements PersonsRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . ('/../..'));
        $dotenv->safeLoad();
        $host = $_ENV['HOST'];
        $db = $_ENV['DB'];
        $user = $_ENV['USER'];
        $password = $_ENV['PASSWORD'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    /**
     * @return Person[]
     */
    public function getAll(): array
    {
        return $this->pdo->query('SELECT * FROM persons ORDER BY surname')
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    /**
     * @param string $code
     * @return Person[]
     */
    public function getByCode(string $code): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE code LIKE '$code' ORDER BY code")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    /**
     * @param string $name
     * @return Person[]
     */
    public function getByName(string $name): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE name LIKE '$name' ORDER BY name")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    /**
     * @param string $surname
     * @return Person[]
     */
    public function getBySurname(string $surname): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE surname LIKE '$surname' ORDER BY surname")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    public function getByGender(string $gender): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE gender LIKE '$gender' ORDER BY gender,surname")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    public function getByYear(string $year): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE year LIKE '$year' ORDER BY year,surname")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    public function getByAddress(string $address): array
    {
        return $this->pdo->query("SELECT * FROM persons WHERE address LIKE '$address' ORDER BY address")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
    }

    public function addPerson(Person $person): void
    {
        $this->pdo->prepare('INSERT INTO persons (code, name, surname, gender, year, address, note) VALUES (?,?,?,?,?,?,?)')
            ->execute([$person->code(), $person->name(), $person->surname(), $person->gender(), $person->year(), $person->address(), $person->note()]);
    }

    public function deletePerson(Person $person): void
    {
        $this->pdo->prepare("DELETE FROM persons WHERE code='{$person->code()}'")->execute();
    }

    public function editNote(Person $person): void
    {
        $this->pdo->prepare("UPDATE persons SET note='{$person->note()}' WHERE code='{$person->code()}'")->execute();
    }

    public function editAddress(Person $person): void
    {
        $this->pdo->prepare("UPDATE persons SET address='{$person->address()}' WHERE code='{$person->code()}'")->execute();
    }
}