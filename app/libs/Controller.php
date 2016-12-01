<?php

namespace App\Libs;

class Controller
{
    protected $view;
    private $lang;

    protected $preload_result;

    function __construct()
    {
        $this->view = new View();
        $this->view->setViewPath(DOCROOT . VIEWS_PATH);
        $this->view->setLangPath(DOCROOT . LANGS_PATH . substr(get_class($this), 0, strpos(get_class($this), "Controller")) . DS);
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        $this->view->setLang($lang);
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function before_action($action, $action_params)
    {

        if (method_exists($this, "preload_" . $action)) {

            try {
                $this->preload_result = Loader::runController($this, "preload_" . $action, $action_params);
                return;
            } catch (\Exception $ex) {
                View::create("errors/error")->set("trace", $ex->getTraceAsString())->render();
                exit;
            }
        }
    }
}