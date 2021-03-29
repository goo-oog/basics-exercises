<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

class NotFoundController
{
    public static function index(): void
    {
        require_once __DIR__ . '/../../public/_404.php';
    }
}