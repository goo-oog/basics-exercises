<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class MySQLTokensRepository implements TokensRepository
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

    public function addToken(string $code, string $token): void
    {
        $this->pdo->prepare('INSERT INTO tokens (code, token,time) VALUES (?,?,?)')
            ->execute([$code, $token, time()]);
    }

    public function searchByToken($token): ?string
    {
        $time = time() - 900;
        $this->pdo->prepare("UPDATE tokens SET valid=0 WHERE time<$time")->execute();
        $stmt = $this->pdo->prepare('SELECT code FROM tokens WHERE token LIKE :token and valid=1 ORDER BY time DESC LIMIT 1');
        $stmt->execute(['token' => $token]);
        return $stmt->fetch(PDO::FETCH_NUM)[0] ?? '';
    }

    public function invalidateToken($token): void
    {
        $this->pdo->prepare("UPDATE tokens SET valid=0 WHERE token='$token'")->execute();
    }
}