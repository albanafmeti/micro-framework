<?php

namespace App\Libs;

class Session
{

    public static function start()
    {
        @session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function setArray(Array $arr, $value)
    {
        $_SESSION[$arr[0]][$arr[1]] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return null;
    }

    public static function getFromArray(Array $arr)
    {
        if (isset($_SESSION[$arr[0]][$arr[1]]))
            return $_SESSION[$arr[0]][$arr[1]];
        else
            return null;
    }

    /**
     * Unset of the session $key
     * @param string $key
     */
    public static function clear($key)
    {
        unset($_SESSION[$key]);
    }

    public static function clearFromArray(Array $arr)
    {
        unset($_SESSION[$arr[0]][$arr[1]]);
    }

    public static function push($key, $value)
    {
        if (isset($_SESSION[$key]) && is_array($_SESSION[$key])) {
            array_push($_SESSION[$key], $value);
        } else {
            $_SESSION[$key] = [];
            array_push($_SESSION[$key], $value);
        }
    }

    public static function destroy()
    {
        session_destroy();
    }
}