<?php
namespace App\Libs;

class Filter
{

    private static $filters = [];

    public static function add($filtName, $callback)
    {
        $fil = new FilterObj();
        $fil->name = $filtName;
        $fil->callback = $callback;
        self::$filters[$filtName] = $fil;
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