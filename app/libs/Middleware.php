<?php
namespace App\Libs;

class Middleware
{

    private static $middlewares = [];

    public static function add($mw_name, $callback)
    {
        $mw = new MW();
        $mw->name = $mw_name;
        $mw->callback = $callback;
        self::$middlewares[$mw_name] = $mw;
    }

    public static function middlewares()
    {
        return self::$middlewares;
    }

    public static function get($mw_name)
    {
        return self::$middlewares[$mw_name];
    }
}

class MW
{
    public $name;
    public $callback;
}