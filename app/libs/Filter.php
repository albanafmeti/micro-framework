<?php
namespace App\Libs;

class Filter
{

    private static $filters = [];

    public static function add($filtName, $callback)
    {
        $mw = new FilterObj();
        $mw->name = $filtName;
        $mw->callback = $callback;
        self::$filters[$filtName] = $mw;
    }

    public static function filters()
    {
        return self::$filters;
    }

    public static function get($filtName)
    {
        if (isset(self::$filters[$filtName])) {
            return self::$filters[$filtName];
        }
    }

    public static function getArray($arrFilt)
    {
        $filts = [];
        foreach ($arrFilt as $filtName) {
            if (isset(self::$filters[$filtName])) {
                array_push($filts, self::$filters[$filtName]);
            }
        }
        return $filts;
    }
}

class FilterObj
{
    public $name;
    public $callback;
}