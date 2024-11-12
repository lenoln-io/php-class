<?php

use Core\Router;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'models/Users.php';
require BASE_PATH.'models/Notes.php';

session_start();


spl_autoload_register(function (string $class) {
    require str_replace('\\','/', base_path("{$class}.php"));
});

require BASE_PATH.'functions.php';

require base_path('Database/Database.php');
require base_path('bootstrap.php');

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

require base_path('routes.php');

$router->accessRoute($uri, strtoupper($method));
