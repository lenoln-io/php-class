<?php

use Core\App;
use Core\Container;
use Database\Database;

$container = new Container();

$container->bind('Database\Database', function (){
    $config = require base_path('config.php');

    return new Database($config);
});

App::setContainer($container);