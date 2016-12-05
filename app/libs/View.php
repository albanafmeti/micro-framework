<?php

namespace App\Libs;

use Philo\Blade\Blade;

class View
{
    private $view;
    private $viewPath;

    private $lang;
    private $langFile;
    private $langPath;

    private $vars = [];
    private $terms = [];

    private $blade;


    function __construct($view = null)
    {
        $this->setViewPath(DOCROOT . VIEWS_PATH);
        $this->setLangPath(DOCROOT . LANGS_PATH . $this->lang . DS);
        $this->blade = new Blade($this->viewPath, DOCROOT . CACHE_PATH);

        $this->view = $view;
    }

    public static function create($name = null)
    {
        $view = new View($name);
        return $view;
    }

    public function setViewPath($viewpath)
    {
        if (is_dir($viewpath)) {
            $this->viewPath = $viewpath;
            return true;
        } else {
            return false;
        }
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    public function setLangPath($langPath)
    {
        if (is_dir($langPath)) {
            $this->langPath = $langPath;
            return true;
        } else {
            return false;
        }
    }

    public function setLangFile($langFile)
    {
        $this->langFile = $langFile;
        $this->loadTerms();
    }

    private function loadTerms()
    {
        if (file_exists($this->langPath . $this->langFile . '.ini')) {
            $this->terms = parse_ini_file($this->langPath . $this->langFile . '.ini');
        }
    }

    public function getTerm($term)
    {
        return (isset($this->terms[$term])) ? $this->terms[$term] : null;
    }

    protected function replaceTerms($string)
    {
        if (count($this->terms)) {
            //Replace the Placeholders : [$Marcer]
            while (preg_match('~\[\$(\w+)\]~', $string, $m)) {
                if (!is_null($this->getTerm($m[1]))) {
                    $string = str_replace($m[0], $this->getTerm($m[1]), $string);
                } else {
                    $string = str_replace($m[0], '__' . $m[1] . '__', $string);
                }
            }
        }
        return $string;
    }

    /**
     *
     * @param string $view
     * @param boolean $vars
     * @return string
     */
    public function render($view = null, $vars = [], $returnOutput = false)
    {
        if (is_null($this->view) && (is_null($view) || empty($view))) {
            throw new \Exception("View $view not found");
        } elseif (!is_null($this->view) && (is_null($view) || empty($view))) {
            $view = $this->view;
        }

        $mergedVars = array_merge($this->vars, $vars);
        $content = $this->blade->view()->make($view, $mergedVars)->render();

        if ($returnOutput) {
            return $this->replaceTerms($content);
        }

        echo $this->replaceTerms($content);
    }

    public function set($varname, $value)
    {
        $this->vars[$varname] = $value;
        return $this;
    }
}