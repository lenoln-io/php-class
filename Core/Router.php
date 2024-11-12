<?php

namespace Core;

use Database\Database;

class Router
{
    private $routes = [];

    protected function add($uri, $title, $controller, $method)
    {
        $this->routes[] = compact('uri', 'title', 'controller', 'method');
        /* resultado da função compact:
            $this->routes[] = [
                'uri' => $uri,
                'title' => $title,
                'controller' => $controller,
                'method' => 'GET'
            ]
            */
    }

    public function get($uri, $title, $controller)
    {
        $this->add($uri, $title, $controller, 'GET');
    }

    public function post($uri, $title, $controller)
    {
        $this->add($uri, $title, $controller, 'POST');

    }

    public function put($uri, $title, $controller)
    {
        $this->add($uri, $title, $controller, 'PUT');
    }

    public function delete($uri, $title, $controller)
    {
        $this->add($uri, $title, $controller, 'DELETE');
    }

    public function patch($uri, $title, $controller)
    {
        $this->add($uri, $title, $controller, 'PATCH');
    }

    function accessRoute($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {

                $database = App::resolve(Database::class);
                return require base_path($route['controller']);
            }
        }

        abort();
    }
}



