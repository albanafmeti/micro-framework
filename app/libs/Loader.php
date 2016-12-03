<?php
namespace App\Libs;

use ReflectionMethod;
use Illuminate\Database\Capsule\Manager as Capsule;
use Philo\Blade\Blade;

class Loader
{
    public static function runController(&$obj, $action = '', $params = [])
    {
        if (!empty($action)) {
            if (method_exists($obj, $action)) {
                if (!empty($params)) {
                    $classMethod = new ReflectionMethod($obj, $action);

                    if (count($classMethod->getParameters()) && $classMethod->getParameters()[0]->getClass()->name == "App\\Libs\\Request") {
                        array_unshift($params, Request::createFromGlobals());
                    }

                    if (count($params) <= $classMethod->getNumberOfParameters() && count($params) >= $classMethod->getNumberOfRequiredParameters()) {
                        call_user_func_array(array($obj, $action), $params);
                    } else {
                        throw new \Exception("Error: Number of parameters is not valid!");
                    }

                } else {

                    $classMethod = new ReflectionMethod($obj, $action);
                    if (count($classMethod->getParameters()) && $classMethod->getParameters()[0]->getClass()->name == "App\\Libs\\Request") {
                        array_unshift($params, Request::createFromGlobals());
                        call_user_func_array(array($obj, $action), $params);
                    } else {
                        call_user_func(array($obj, $action));
                    }

                }
            } else {
                throw new \Exception("Error: Action is not valid - (" . get_class($obj) . "/$action)!");
            }
        }
    }

    public static function configureORM()
    {

        /**
         * Configure the database and boot Eloquent
         */
        $capsule = new Capsule;
        $capsule->addConnection(config("db")['mysql']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        date_default_timezone_set('UTC');
    }
}
