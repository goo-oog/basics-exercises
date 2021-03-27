<?php
declare(strict_types=1);


namespace Registry\App;

use PDO;
use PDOException;

class MySQL implements Repository
{
    private PDO $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $db = 'registry';
        $user = 'gints';
        $password = '';
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
        return $this->pdo->query('SELECT * FROM registry.register')
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'note']);
    }

    public function getByCode(string $code): Person
    {
        $stmt = $this->pdo->prepare("SELECT * FROM registry.register WHERE code = $code");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'note']);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByName(string $name): Person
    {
        $stmt = $this->pdo->prepare("SELECT * FROM registry.register WHERE name = $name");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'note']);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getBySurname(string $surname): Person
    {
        $stmt = $this->pdo->prepare("SELECT * FROM registry.register WHERE surname = $surname");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Person::class, ['code', 'name', 'surname', 'note']);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addPerson(Person $person): void
    {
        $this->pdo->prepare('INSERT INTO registry.register (code, name, surname, note) VALUES (?,?,?,?)')
            ->execute([$person->code(), $person->name(), $person->surname(), $person->note()]);
    }

    public function deletePerson(Person $person): void
    {
        $this->pdo->prepare("DELETE FROM registry.register WHERE code={$person->code()}")->execute();
    }

    public function editNote(Person $person): void
    {
        $this->pdo->prepare("UPDATE registry.register SET note={$person->note()} WHERE code={$person->code()}");
    }
}