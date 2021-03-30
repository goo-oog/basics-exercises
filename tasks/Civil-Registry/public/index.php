<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use League\Container\Container;
use Registry\App\Controllers\NotFoundController;
use Registry\App\Controllers\AppController;
use Registry\App\Repositories\MySQLPersonsRepository;
use Registry\App\Repositories\PersonsRepository;
use Registry\App\Services\PersonsDataManagementService;
use Registry\App\Services\RepositoryService;

session_start();

$container = new Container();
$container->add(PersonsRepository::class, MySQLPersonsRepository::class);
$container->add(RepositoryService::class)->addArgument(PersonsRepository::class);
$container->add(PersonsDataManagementService::class)->addArgument(RepositoryService::class);
$container->add(AppController::class)->addArgument(PersonsDataManagementService::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->get('/', [AppController::class, 'showMainPage']);
    $r->get('/add', [AppController::class, 'showAddPersonForm']);
    $r->post('/add/execute', [AppController::class, 'addPerson']);
    $r->post('/edit', [AppController::class, 'showEditNoteForm']);
    $r->post('/edit/execute', [AppController::class, 'editNote']);
    $r->post('/delete', [AppController::class, 'deletePerson']);
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
        (new NotFoundController())->index();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        (new NotFoundController())->index();
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->get($class)->$method($vars);
        break;
}