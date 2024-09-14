<?php

return [
    'dbms' => 'mysql',
    'config' => [
        'host' => 'localhost',
        'port'=> '3306',
        'dbname' => 'db_notes',
        'charset' => 'utf8mb4'
    ],
    'auth' => [
        'username' => 'root',
        'password' => '',
    ],
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ],
    'currentUser' => 1
];
