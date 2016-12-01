<?php

namespace App\Libs;


class Flash
{
    private static $messages = "flash_messages";
    private static $warnings = "flash_warnings";
    private static $dangers = "flash_dangers";

    public static function addMessage($message)
    {
        Session::push(self::$messages, $message);
    }

    public static function addWarning($message)
    {
        Session::push(self::$warnings, $message);
    }

    public static function addDanger($message)
    {
        Session::push(self::$dangers, $message);
    }

    public static function hasMessage()
    {
        return (!is_null(Session::get(self::$messages))) ? true : false;
    }

    public static function hasWarning()
    {
        return (!is_null(Session::get(self::$warnings))) ? true : false;
    }

    public static function hasDanger()
    {
        return (!is_null(Session::get(self::$dangers))) ? true : false;
    }

    public static function has()
    {
        return (!is_null(Session::get(self::$messages)) || !is_null(Session::get(self::$warnings)) || !is_null(Session::get(self::$dangers))) ? true : false;
    }

    public static function showMessage()
    {
        if (self::hasMessage()) {
            foreach (Session::get(self::$messages) as $message) {
                echo View::create()->render("core/flash", ["class" => "success", "message" => $message], true);
            }
            Session::clear(self::$messages);
        }
    }

    public static function showWarning()
    {
        if (self::hasWarning()) {
            foreach (Session::get(self::$warnings) as $message) {
                echo View::create()->render("core/flash", ["class" => "warning", "message" => $message], true);
            }
            Session::clear(self::$warnings);
        }
    }

    public static function showDanger()
    {
        if (self::hasDanger()) {
            foreach (Session::get(self::$dangers) as $message) {
                echo View::create()->render("core/flash", ["class" => "danger", "message" => $message], true);
            }
            Session::clear(self::$dangers);
        }
    }

    public static function showAll()
    {
        self::showMessage();
        self::showWarning();
        self::showDanger();
    }
}