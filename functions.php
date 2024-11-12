<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';

    die();
}

function pageStyle($uri): string
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $uri ? 'bg-emerald-600 text-white' : 'text-emerald-500 hover:bg-emerald-700 hover:text-white';
}

#[NoReturn] function abort($code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require 'controllers/errors/' . $code . '.php';
    die();
}

function authorization($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

#[NoReturn] function login($user): void
{
    $_SESSION['auth'] = $user;

    session_regenerate_id(true);
    header('location: /notes');
    exit();
}

#[NoReturn] function logout(): void
{
    unset($_SESSION['auth']);

    session_regenerate_id(true);
    session_destroy();

    header('location: /login');
    exit();
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($view, $attributes = []): void
{
    extract($attributes);

    require 'views/templates/app.php';
}