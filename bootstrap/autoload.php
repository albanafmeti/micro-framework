<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    $className = array_pop($parts);

    if (is_file(DOCROOT . LIBS_PATH . $className . '.php')) {
        require_once DOCROOT . LIBS_PATH . $className . '.php';
        return;
    }

    if (is_file(DOCROOT . MODELS_PATH . $className . '.php')) {
        require_once DOCROOT . MODELS_PATH . $className . '.php';
        return;
    }

    if (is_file(DOCROOT . EXCEPTIONS_PATH . $className . '.php')) {
        require_once DOCROOT . EXCEPTIONS_PATH . $className . '.php';
        return;
    }

    if (is_file(DOCROOT . MODULES_PATH . $className . '.php')) {
        require_once DOCROOT . MODULES_PATH . $className . '.php';
        return;
    }
}

spl_autoload_register("__autoload");
require '../vendor/autoload.php';

function config($key)
{
    switch ($key) {
        case "db" :
            return include DOCROOT . CONFIG_PATH . "database.php";
            break;
    }
}