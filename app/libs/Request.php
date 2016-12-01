<?php

namespace App\Libs;

class Request
{

    private static $url;
    private static $controller;
    private static $action;
    private static $parameters;
    private static $lang;
    private static $route;
    private static $input = [];

    public static function create()
    {
        self::$input = $_REQUEST;
    }

    public static function getUrl()
    {
        return self::$url;
    }

    public static function getController()
    {
        return self::$controller;
    }

    public static function getAction()
    {
        return self::$action;
    }

    public static function getParameters()
    {
        return self::$parameters;
    }

    static function getLang()
    {
        return self::$lang;
    }

    public static function setUrl($url)
    {
        self::$url = $url;
    }

    public static function setController($controller)
    {
        self::$controller = $controller;
    }

    public static function setAction($action)
    {
        self::$action = $action;
    }

    public static function setParameters($parameters)
    {
        self::$parameters = $parameters;
    }

    public static function setLang($lang)
    {
        self::$lang = $lang;
    }

    public static function setRoute(Route $route)
    {
        self::$route = $route;
    }

    public static function route()
    {
        return self::$route;
    }

    public static function clear($key)
    {
        if (isset($_REQUEST[$key])) {
            unset($_REQUEST[$key]);
        }
        if (isset(self::$input[$key])) {
            unset(self::$input[$key]);
        }
    }

    public static function get()
    {
        return new Request();
    }

    public function input($key)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return null;
    }

    public static function in($key)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return null;
    }

    public function has($key)
    {
        if (isset($_REQUEST[$key])) {
            return true;
        }
        return false;
    }

    public function is($pattern)
    {

        $pattern = ltrim($pattern, "/");
        if (substr($pattern, -1) == "%" && substr(self::$url, 0, strlen($pattern)) === $pattern) {
            return true;
        } elseif ($pattern == self::$url) {
            return true;
        }
        return false;
    }

    public function all()
    {
        return self::$input;
    }
}
