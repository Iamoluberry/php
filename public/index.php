<?php

use Core\Router;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\","/", $class);
    require basePath( $class . '.php');
});

//require basePath('config.php');
//require basePath('Core/Response.php');
//require basePath('Database.php');
//require basePath('Core/Router.php');

//$router = new \Core\Router();

$router = new Router();

$routes = require basePath('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->route($uri, $method);