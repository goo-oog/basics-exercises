<?php
declare(strict_types=1);

namespace Registry\Controllers;

class NotFoundController
{
    public static function index(): void
    {
        require_once __DIR__ . '/../pub/_404.php';
    }
}