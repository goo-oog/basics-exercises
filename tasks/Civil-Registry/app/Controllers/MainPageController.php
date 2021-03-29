<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

class MainPageController
{
    public static function index(): void
    {
        require_once __DIR__ . '/../../public/_main-page.php';
    }
}