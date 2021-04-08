<?php
declare(strict_types=1);

namespace Registry\App\Repositories;

interface TokensRepository
{
    public function addToken(string $code, string $token): void;

    public function searchByToken($token): ?string;

    public function invalidateToken($token): void;
}