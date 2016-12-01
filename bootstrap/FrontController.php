<?php
namespace Bootstrap;

use App\Exceptions\HttpNotFoundException;
use App\Libs\Session;
use App\Libs\Request;
use App\Libs\Settings;
use App\Libs\Router;
use App\Libs\Loader;
use App\Libs\View;
use App\Exceptions\NotAllowedFilterException;
use App\Exceptions\ControllerNotFoundException;
use Exception;

class FrontController
{
    private $controller;
    private $action;
    private $parameters = [];
    private $current_lang = "en";

    function __construct()
    {
        Session::start();
    }

    public function bootstrap()
    {
        Request::create();
        $request = Request::in("req");
        Request::clear("req");
        Request::setUrl($request);

        try {
            $this->route($request);
            include DOCROOT . CONFIG_PATH . "globals.php";
            include DOCROOT . APP_PATH . "helpers.php";
            $this->dispatch();
        } catch (Exception $ex) {
            View::create("errors/error")->set("message", $ex->getMessage())->render();
            exit;
        }
    }

    public function route($request)
    {

        $request = self::URItoArray($request);

        //Check the language
        if (is_numeric(array_search($request[0], Settings::$available_langs))) {
            $this->current_lang = $request[0];
            array_shift($request);
            if (empty($request)) {
                array_push($request, "");
            }
        }

        try {
            $this->ProcessRequest($request);
        } catch (Exception $ex) {
            throw $ex;
        }

        Request::setController($this->controller);
        Request::setAction($this->action);
        Request::setParameters($this->parameters);
        Request::setLang($this->current_lang);
        return;
    }

    public function dispatch()
    {
        //Load the Controller
        if ($this->isController($this->controller)) {

            $filename = DOCROOT . CONTROLLERS_PATH . $this->controller . '.php';
            require_once $filename;
            $cName = $this->controller;
            $controller = new $cName();

            $controller->setLang($this->current_lang);

            try {

                //Execute Pre Action
                $controller->before_action($this->action, $this->parameters);

                //Execute Modules
                $route = Request::route();
                foreach ($route->modules as $module) {
                    $module->execute(Request::get());
                }

                //Execute Action
                Loader::runController($controller, $this->action, $this->parameters);
            } catch (Exception $ex) {
                throw $ex;
            }

        } else {
            throw new ControllerNotFoundException("Controller $this->controller not found!");
        }
        return;
    }

    private static function URItoArray($url)
    {
        $url = rtrim($url, '/');
        $url = urldecode($url);
        $url = explode('/', $url);
        return $url;
    }

    private function ProcessRequest($request)
    {
        include DOCROOT . APP_PATH . "filters.php";
        include DOCROOT . APP_PATH . "routes.php";
        $route = Router::findRoute($request, $_SERVER['REQUEST_METHOD']);
        if (!is_null($route)) {

            Request::setRoute($route);
            if (!Router::runMW($route)) {
                throw new NotAllowedFilterException("Not Allowed to advance!");
            }
            $this->controller = $route->controller;
            $this->action = $route->action;
            $this->parameters = $route->parameters;
        } else {
            throw new HttpNotFoundException("404 - Http request not found", 404);
        }
    }

    public function isController($name)
    {
        if (file_exists(DOCROOT . CONTROLLERS_PATH . $name . '.php')) {
            return true;
        } else {
            return false;
        }
    }
}
