<?php

use App\Controllers\Fullname;
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Logout;
use App\Controllers\Password;
use App\Controllers\Register;
use Src\Request;
use Src\Router;
use Src\Session;

spl_autoload_register(function ($class) {
    require_once dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
});

Session::start();

$request = Request::getInstance();

$router = new Router();

$router->add('register', Register::class);
$router->add('login', Login::class);
$router->add('home', Home::class);
$router->add('password', Password::class);
$router->add('fullname', Fullname::class);
$router->add('logout', Logout::class);

$result = $router->match($request->uri());

$controller = $result['controllerName'];
$requestWithQuery = $request->withQuery($result['params']);

(new $controller($requestWithQuery))();