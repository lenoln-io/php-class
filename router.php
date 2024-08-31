<?php

$page = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'controllers/home.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

if(array_key_exists($page, $routes)) {
    include $routes[$page];
} else {
    abort();
}
