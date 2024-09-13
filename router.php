<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$pages = [
    '/' => [
        'title' => 'Home',
        'path' => 'controllers/home.php'
    ],
    '/about' => [
        'title' => "About Us!",
         'path' => 'controllers/about.php',
    ],
    '/contact' =>  [
        'title' => 'Contact Us!',
        'path' =>   'controllers/contact.php',
    ],
    '/notes' => [
        'title' => 'Notes',
        'path' => 'controllers/notes/read.php',
    ],
    '/note/' => [
        'title' => 'My Note',
        'path' => 'controllers/notes/note.php',
    ]
];

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


