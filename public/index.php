<?php

use Core\Router;

const BASE_PATH = __DIR__.'/../';
function base_path($path): string { return BASE_PATH.$path; }

spl_autoload_register(function (string $class) {
    require str_replace('\\','/', base_path("{$class}.php"));
});
require base_path('functions.php');

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

require base_path('routes.php');

$router->accessRoute($uri, strtoupper($method));