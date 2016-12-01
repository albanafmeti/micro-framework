<?php

namespace App\Libs;

use Philo\Blade\Blade;

class View
{
    private $view_path;
    private $view;

    private $lang_path;
    private $lang;

    private $vars = [];
    private $arrPlaceholders = [];
    private $terms = [];

    private $blade;


    function __construct($view = null)
    {
        $this->setViewPath(DOCROOT . VIEWS_PATH);
        $this->setLangPath(DOCROOT . LANGS_PATH);
        $this->blade = new Blade($this->view_path, DOCROOT . CACHE_PATH);
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
            $this->view_path = $viewpath;
            return true;
        } else {
            return false;
        }
    }

    public function setLangPath($langpath)
    {

        if (is_dir($langpath)) {
            $this->lang_path = $langpath;
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @param string $view
     * @param boolean $vars
     * @return string
     */
    public function render($view = null, $vars = [], $return_output = false)
    {
        if (is_null($this->view) && (is_null($view) || empty($view))) {
            return "";
        } elseif (!is_null($this->view) && (is_null($view) || empty($view))) {
            $view = $this->view;
        }

        $merged_vars = array_merge($this->vars, $vars);
        $content = $this->blade->view()->make($view, $merged_vars)->render();

        if ($return_output) {
            return $this->replace_vars($content);
        }

        echo $this->replace_vars($content);
    }

    public function set($varname, $value)
    {
        $this->vars[$varname] = $value;
        return $this;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        $this->loadTerms();
        return $this;
    }

    private function loadTerms()
    {
        if (file_exists($this->lang_path . $this->lang . '.ini')) {
            $this->terms = parse_ini_file($this->lang_path . $this->lang . '.ini');
        }
    }

    public function getTerm($term)
    {
        return (isset($this->terms[$term])) ? $this->terms[$term] : null;
    }


    public function placeholder($name)
    {

        $phObj = null;

        foreach ($this->arrPlaceholders as $phname => $ph) {
            if ($phname == $name) {
                $phObj = $ph;
                break;
            }
        }

        if (is_null($phObj)) {
            $phObj = new ViewPlaceholder($name);
            $this->arrPlaceholders[$name] = $phObj;
        }

        return $phObj;
    }

    protected function replace_vars($string)
    {

        //I replace the result of an array if I find the string in the text {:xxxx[yyy]}
        while (preg_match('~\{\:([a-zA-Z0-9\_]*)\[([a-zA-Z0-9\_]*)\]?\}~sU', $string, $m)) {
            $string = str_replace($m[0], (isset($vars[$m[1]][$m[2]]) ? $vars[$m[1]][$m[2]] : ''), $string);
        }
        //I replace the result of a variable if I find the string in the text {:xxxx}
        while (preg_match('~\{\:([a-zA-Z0-9\_]*)?\}~sU', $string, $m)) {
            $string = str_replace($m[0], (isset($vars[$m[1]]) ? $vars[$m[1]] : ''), $string);
        }

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

        //Replace the Placeholders : {Marcer}
        $temp_string = $string;
        while (preg_match('~{(\w+)}~', $temp_string, $m)) {
            if (isset($this->arrPlaceholders[$m[1]]))
                $string = str_replace($m[0], $this->arrPlaceholders[$m[1]]->getVal(), $string);

            $temp_string = str_replace($m[0], $m[1], $temp_string);
        }

        //Replace the Placeholders : [[Marcer]]
        $temp_string = $string;
        while (preg_match('~\[\[(\w+)\]\]~', $temp_string, $m)) {
            if (isset($this->arrPlaceholders[$m[1]]))
                $string = str_replace($m[0], $this->arrPlaceholders[$m[1]]->getVal(), $string);

            $temp_string = str_replace($m[0], $m[1], $temp_string);
        }

        return $string;
    }

}

class ViewPlaceholder
{
    private $name = null;
    private $value = null;
    private $htmlentities = true;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setVal($val)
    {
        if ($this->htmlentities)
            $val = nl2br(htmlentities($val));
        $this->value = $val;
    }

    public function getVal()
    {
        return $this->value;
    }
}
