<?php

namespace Core;

class Container
{
    private static $bindings = [];

    public static function bind($key, $resolver)
    {
        static::$bindings[$key] = $resolver;
    }

    public static function resolve($key)
    {
        if(! array_key_exists($key, static::$bindings)){
            return throw new \Exception("This binding {$key} wasn't found.");
        }

        return call_user_func(static::$bindings[$key]);
    }
}