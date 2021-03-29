<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Registry\App\Controllers\MainPageController;
use Registry\App\Controllers\NotFoundController;
use Registry\App\Controllers\PersonController;

session_start();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->get('/', [MainPageController::class, 'index']);
    $r->post('/', [MainPageController::class, 'index']);
    $r->get('/add', [PersonController::class, 'showAddPersonForm']);
    $r->post('/add', [PersonController::class, 'add']);
    $r->post('/edit', [PersonController::class, 'edit']);
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