<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$pages = require 'routes.php';

$route = $pages[$uri];

$pageExists = array_key_exists($uri, $pages);

accessRoute($pageExists, $route);

function accessRoute($pageExists, $route)
{
    if($pageExists) {
        $title = $route['title'];
        include $route['path'];
    } else {
        abort();
    }
}


