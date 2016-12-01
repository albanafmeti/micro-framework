<?php

namespace App\Libs;

use Exception;

class Router
{
    private static $routes = [];
    private $route;

    public function get($alias)
    {
        $alias = ltrim($alias, "/");
        $this->route = new Route();
        $this->route->alias = $alias;
        $this->route->method = "GET";
        return $this;
    }

    public function post($alias)
    {
        $alias = ltrim($alias, "/");
        $this->route = new Route();
        $this->route->alias = $alias;
        $this->route->method = "POST";
        return $this;
    }

    public function put($alias)
    {
        $alias = ltrim($alias, "/");
        $this->route = new Route();
        $this->route->alias = $alias;
        $this->route->method = "PUT";
        return $this;
    }

    public function delete($alias)
    {
        $alias = ltrim($alias, "/");
        $this->route = new Route();
        $this->route->alias = $alias;
        $this->route->method = "DELETE";
        return $this;
    }

    public function mw($mw_name)
    {
        if (is_object($this->route)) {
            $this->route->middleware = Middleware::get($mw_name);
        } else {
            throw new Exception("You have to set the route first!");
        }
        return $this;
    }

    public function controller($controller)
    {
        if (is_object($this->route)) {
            $this->route->controller = $controller;
        } else {
            throw new Exception("You have to set the route first!");
        }
        return $this;
    }

    public function action($action)
    {
        if (is_object($this->route)) {
            $this->route->action = $action;
        } else {
            throw new Exception("You have to set the route first!");
        }
        return $this;
    }

    public function target($pattern) {
        if (is_object($this->route)) {
            $pattern = explode("@", $pattern);
            $this->route->controller = $pattern[0];
            $this->route->action = $pattern[1];
        } else {
            throw new Exception("You have to set the route first!");
        }
        return $this;
    }

    public function modules($modules)
    {
        if (is_object($this->route)) {
            $this->route->modules = $modules;
        } else {
            throw new Exception("You have to set the route first!");
        }
        return $this;
    }

    public function add()
    {
        array_push(self::$routes, $this->route);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function findRoute($alias, $method) //array of separated paths
    {

        foreach (self::$routes as $route) {

            $route_parts = explode("/", $route->alias);
            $founded = false;
            $removed_paths = [];

            foreach ($route_parts as $i => $part) {

                if (!isset($alias[$i])) {
                    $founded = false;
                    continue;
                };

                if ($part == $alias[$i]) {
                    $founded = true;
                } else {
                    $founded = false;
                }

                array_push($removed_paths, $alias[$i]);

                if ($i == count($route_parts) - 1) {
                    $route->parameters = array_diff($alias, $removed_paths);
                }
            }
            if ($founded) {

                if ($route->method == $method) {
                    return $route;
                } else {
                    continue;
                }

            }
        }

        return null;
    }

    public static function runMW(Route $route)
    {
        $middleware = $route->middleware;

        if (!is_null($middleware)) {
            $callback = $middleware->callback;
            return $callback(Request::get());
        }
        return true;
    }
}

class Route
{
    public $alias;
    public $method;
    public $middleware;
    public $controller;
    public $action;
    public $parameters = [];

    public $modules = [];
}

