<?php
require 'Response.php';

function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';

    die();
}

function pageStyle($uri){
    return  parse_url($_SERVER['REQUEST_URI'])['path'] === $uri ? 'bg-gray-500 text-white' :  'text-gray-300 hover:bg-gray-700 hover:text-white';
}

function abort($code = Response::NOT_FOUND){
    http_response_code($code);

    require 'controllers/errors/'.$code.'.php';
    die();
}