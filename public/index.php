<?php
const BASE_PATH = __DIR__.'/../';

function base_path($path): string
{
    return BASE_PATH.$path;
}

spl_autoload_register(function (string $class) {
    require str_replace('\\','/', base_path("{$class}.php"));
});

require base_path('functions.php');
require base_path('router.php');
