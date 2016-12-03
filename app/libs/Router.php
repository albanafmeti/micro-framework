<?php

namespace App\Libs;

use Exception;

class Router
{
    private static $routes = [];
    private $route;


    public function get($alias)
    {
        $this->route = new Route();
        $this->route->alias = ltrim($alias, "/");
        $this->route->method = "GET";
        return $this;
    }

    public function post($alias)
    {
        $this->route = new Route();
        $this->route->alias = ltrim($alias, "/");
        $this->route->method = "POST";
        return $this;
    }

    public function put($alias)
    {

        $this->route = new Route();
        $this->route->alias = ltrim($alias, "/");
        $this->route->method = "PUT";
        return $this;
    }

    public function delete($alias)
    {
        $this->route = new Route();
        $this->route->alias = ltrim($alias, "/");
        $this->route->method = "DELETE";
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

    public function target($pattern)
    {
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

    public function add($filters = [])
    {

        if (is_string($filters)) {
            $this->route->filters = [Filter::get($filters)];
        } else if (is_array($filters)) {
            $this->route->filters = Filter::getArray($filters);
        }

        array_push(self::$routes, $this->route);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }


    public static function findRoute($alias, $method) //:alias -> array of separated paths
    {

        foreach (self::$routes as $route) {

            $routeParts = explode("/", $route->alias);

            $founded = false;
            $removedPaths = [];

            foreach ($routeParts as $i => $part) {

                if (!isset($alias[$i])) {
                    $founded = false;
                    continue;
                };

                if ($part == $alias[$i]) {
                    $founded = true;
                } else {
                    $founded = false;
                }

                array_push($removedPaths, $alias[$i]);

                if ($i == count($routeParts) - 1) {
                    $route->parameters = array_diff($alias, $removedPaths);
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

    public static function runFilters(Route $route)
    {

        if (!empty($route->filters)) {

            foreach ($route->filters as $filter) {
                $callback = $filter->callback;
                $callback(Request::createFromGlobals());
            }
        }
        return;
    }
}

class Route
{
    public $alias;
    public $method;
    public $filters = [];
    public $controller;
    public $action;
    public $parameters = [];
    public $modules = [];
}

