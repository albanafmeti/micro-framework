<?php

define('WEBROOT', '/');
define('DEVELOPMENT_MODE', true);

define('APP_PATH', 'app' . DS);
define('CONFIG_PATH', 'config' . DS);
define('BOOTSTRAP_PATH', 'bootstrap' . DS);
define('CONTROLLERS_PATH', 'app' . DS . 'controllers' . DS);
define('MODULES_PATH', 'app' . DS . 'modules' . DS);
define('MODELS_PATH', 'app' . DS . 'models' . DS);
define('LIBS_PATH', 'app' . DS . 'libs' . DS);
define('EXCEPTIONS_PATH', 'app' . DS . 'exceptions' . DS);
define('VIEWS_PATH', 'resources' . DS . 'views' . DS);
define('LANGS_PATH', 'resources' . DS . 'langs' . DS);
define('CACHE_PATH', 'storage' . DS . 'cache' . DS);
define('LOGS_PATH', 'storage' . DS . 'logs' . DS);

function setReporting() {
    if (DEVELOPMENT_MODE == true) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', DOCROOT . LOGS_PATH . 'error.log');
    }
}