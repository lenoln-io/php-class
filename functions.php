<?php
function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';

    die();
}

function urlIs($uri){
    return $_SERVER['REQUEST_URI'] === $uri;
}