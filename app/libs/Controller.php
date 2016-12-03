<?php

namespace App\Libs;

class Controller
{
    protected $view;
    private $lang;

    protected $preloadResult;

    function __construct()
    {
        $this->view = new View();
        $this->view->setViewPath(DOCROOT . VIEWS_PATH);
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        $this->view->setLangPath(DOCROOT . LANGS_PATH . $this->getLang() . DS);
        $this->view->setLang($lang);
        $this->view->setLangFile(strtolower(substr(get_class($this), 0, strpos(get_class($this), "Controller"))));
    }

    public function setLangFile($langFile)
    {
        $this->view->setLangFile(rtrim($langFile, ".ini"));
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function before_action($action, $actionParams)
    {
        if (method_exists($this, "preload_" . $action)) {
            $this->preloadResult = Loader::runController($this, "preload_" . $action, $actionParams);
        }
    }
}