<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

use Registry\App\Services\TwigService;

class NotFoundController
{
    private TwigService $twig;

    public function __construct()
    {
        $this->twig = new TwigService();
    }

    public function index(): void
    {
        echo $this->twig->environment()->render('_not-found.twig');
    }
}