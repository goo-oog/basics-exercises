<?php

declare(strict_types=1);

namespace Registry\App\Controllers;

class EditNoteController
{
    public static function index(): void
    {
        require_once __DIR__ . '/../../public/_edit-note.php';
    }
}