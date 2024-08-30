<?php
$page = $_SERVER['REQUEST_URI'];

switch ($page) {
    case '/home':
        require 'controllers/home.php';
        break;
        case '/about':
            require 'controllers/about.php';
            break;
            case '/contact':
                require 'controllers/contact.php';
                break;
                default:
                    require 'controllers/error.php';
                    break;
}
