<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

use PDO;
use Registry\App\Services\MySQLService;

class MySQLTokensRepository implements TokensRepository
{
    private MySQLService $mySQL;

    public function __construct(MySQLService $mySQLService)
    {
        $this->mySQL = $mySQLService;
    }

    public function addToken(string $code, string $token): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO tokens (code, token,time) VALUES (?,?,?)')
            ->execute([$code, $token, time()]);
    }

    public function searchByToken($token): ?string
    {
        $time = time() - 900;
        $this->mySQL->pdo()->prepare("UPDATE tokens SET valid=0 WHERE time<$time")->execute();
        $stmt = $this->mySQL->pdo()->prepare('SELECT code FROM tokens WHERE token LIKE :token and valid=1 ORDER BY time DESC LIMIT 1');
        $stmt->execute(['token' => $token]);
        return $stmt->fetch(PDO::FETCH_NUM)[0] ?? '';
    }

    public function invalidateToken($token): void
    {
        $this->mySQL->pdo()->prepare("UPDATE tokens SET valid=0 WHERE token='$token'")->execute();
    }
}