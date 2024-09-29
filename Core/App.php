<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    protected static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::$container[$key] = $resolver;
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
