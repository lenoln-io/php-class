<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$pages = require 'routes.php';

$pageExists = array_key_exists($uri, $pages);

$route = $pages[$uri];

accessRoute($pageExists, $route);

function accessRoute($pageExists, $route)
{
    if(! $pageExists) {
        abort();
    }

    $title = $route['title'];
    include $route['path'];
}


