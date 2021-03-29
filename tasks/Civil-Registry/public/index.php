<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Registry\App\Controllers\AddPersonController;
use Registry\App\Controllers\EditNoteController;
use Registry\App\Controllers\MainPageController;
use Registry\App\Controllers\NotFoundController;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->get('/', [MainPageController::class, 'index']);
    $r->post('/', [MainPageController::class, 'index']);
    $r->post('/add', [AddPersonController::class, 'index']);
    $r->post('/edit', [EditNoteController::class, 'index']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        call_user_func([NotFoundController::class, 'index']);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        call_user_func([NotFoundController::class, 'index']);
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        call_user_func($routeInfo[1]);
        break;
}