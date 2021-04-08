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
     * @param string $subject
     * @param string $value
     * @param string $orderBy
     * @return Person[]
     */
    public function search(string $subject, string $value, string $orderBy): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM persons WHERE $subject LIKE :value ORDER BY $orderBy");
        $stmt->execute(['value' => $value]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'gender', 'year', 'address', 'note']);
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
