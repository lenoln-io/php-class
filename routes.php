<?php
return [
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
        'path' => 'controllers/notes/index.php',
    ],
    '/note' => [
        'title' => 'My Note',
        'path' => 'controllers/notes/read.php',
    ],
    '/note/new' => [
        'title' => 'Create a Note',
        'path' => 'controllers/notes/create.php',
    ]
];