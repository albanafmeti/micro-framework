<?php

namespace App\Libs;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{
    private static $controller;
    private static $action;
    private static $parameters;
    private static $lang;
    private static $route;

    public static function getPath()
    {
        return self::createFromGlobals()->getPathInfo();
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

    public static function getLang()
    {
        return self::$lang;
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

    public static function getRoute()
    {
        return self::$route;
    }

    public static function clear($key)
    {
        if (isset($_REQUEST[$key])) {
            unset($_REQUEST[$key]);
        }
    }

    public static function input($key)
    {
        return self::createFromGlobals()->get($key);
    }

    public function has($key)
    {
        if (!is_null(Request::createFromGlobals()->get($key, null))) {
            return true;
        }
        return false;
    }

    public static function is($pattern)
    {
        $pattern = ltrim($pattern, "/");
        if (substr($pattern, -1) == "%" && substr(rtrim(self::getPath(), "/"), 0, strlen($pattern)) === $pattern) {
            return true;
        } elseif ($pattern == ltrim(self::getPath(), "/")) {
            return true;
        }
        return false;
    }
}
