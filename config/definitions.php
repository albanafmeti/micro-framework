<?php

define('DS', DIRECTORY_SEPARATOR);
define('DOCROOT', dirname(dirname(__FILE__)) . DS);
define('WEBROOT', '/');
define('SHOW_ERRORS', true);

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
define('CACHE_PATH', 'cache' . DS);