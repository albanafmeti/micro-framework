<?php

namespace App\Libs;

class Module
{
    public $view;
    protected $content;
    protected $parameters = [];

    function __construct()
    {
        $this->view = new View();
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public static function output($position)
    {
        $modules = Request::route()->modules;

        if (isset($modules[$position])) {
            echo $modules[$position]->getContent();
        }
    }
}