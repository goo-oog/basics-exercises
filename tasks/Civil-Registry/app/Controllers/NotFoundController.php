<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

class NotFoundController
{
    public function index(): void
    {
        require_once __DIR__ . '/../../public/_not-found.php';
    }
}
