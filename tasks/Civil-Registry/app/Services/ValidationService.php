<?php
declare(strict_types=1);

namespace Registry\App\Services;

class ValidationService
{
    public function code(string $code): int
    {
        return preg_match('/^\d{6}-?\d{5}$/', $code);
    }

    public function name(string $name): int
    {
        return preg_match('/^[a-zāčēģīķļņšūž]+(?:[[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $name);
    }

    public function surname(string $surname): int
    {
        return preg_match('/^[a-zāčēģīķļņšūž]+(?:[-[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $surname);
    }

    public function gender(string $gender): bool
    {
        return $gender === 'M' || $gender === 'F';
    }
}