<?php

require "../config/definitions.php";
if (SHOW_ERRORS) ini_set("display_errors", "1");

include DOCROOT . BOOTSTRAP_PATH . "autoload.php";
include DOCROOT . BOOTSTRAP_PATH . "FrontController.php";

$loader = new \App\Libs\Loader();
$loader->configureORM();

$app = new Bootstrap\FrontController();
$app->bootstrap();
