<?php

define('DS', DIRECTORY_SEPARATOR);
define('DOCROOT', dirname(dirname(__FILE__)) . DS);

require DOCROOT . 'config' . DS . 'definitions.php';
setReporting();

require DOCROOT . 'vendor' . DS . 'autoload.php';
require DOCROOT . BOOTSTRAP_PATH . "FrontController.php";

$app = new Bootstrap\FrontController();
$app->bootstrap();
