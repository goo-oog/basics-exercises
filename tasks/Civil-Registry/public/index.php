<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use League\Container\Container;
use Registry\App\Controllers\NotFoundController;
use Registry\App\Controllers\AppController;
use Registry\App\Repositories\MySQLPersonsRepository;
use Registry\App\Repositories\MySQLTokensRepository;
use Registry\App\Repositories\PersonsRepository;
use Registry\App\Repositories\TokensRepository;
use Registry\App\Services\AppMainService;
use Registry\App\Services\PersonsRepositoryService;

session_start();

$container = new Container();
$container->add(PersonsRepository::class, MySQLPersonsRepository::class);
$container->add(TokensRepository::class, MySQLTokensRepository::class);
$container->add(PersonsRepositoryService::class)->addArgument(PersonsRepository::class);
$container->add(AppMainService::class)->addArguments([PersonsRepositoryService::class, TokensRepository::class]);
$container->add(AppController::class)->addArgument(AppMainService::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->get('/', [AppController::class, 'showMainPage']);
    $r->get('/add', [AppController::class, 'showAddPersonForm']);
    $r->get('/login', [AppController::class, 'login']);
    $r->post('/logout', [AppController::class, 'logout']);
    $r->post('/login', [AppController::class, 'loginVerify']);
    $r->get('/auth-success', [AppController::class, 'authorizationSuccessful']);
    $r->post('/add/execute', [AppController::class, 'addPerson']);
    $r->post('/edit-address', [AppController::class, 'showEditAddressForm']);
    $r->post('/edit-address/execute', [AppController::class, 'editAddress']);
    $r->post('/edit-note', [AppController::class, 'showEditNoteForm']);
    $r->post('/edit-note/execute', [AppController::class, 'editNote']);
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
        echo (new NotFoundController())->index();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo (new NotFoundController())->index();
        break;
    case FastRoute\Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $container->get($class)->$method($vars);
}