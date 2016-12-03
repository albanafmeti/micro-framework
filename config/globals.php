<?php

function config($key)
{
    switch ($key) {
        case "db" :
            return include DOCROOT . CONFIG_PATH . "database.php";
            break;
    }
}

function route($path, Array $params = [])
{
    $request = \App\Libs\Request::createFromGlobals();
    $params = implode("/", $params);
    return 'http://' . $request->server->get('HTTP_HOST') . '/' . trim($path, "/") . (($params != '') ? "/$params" : "");
}

function module($position)
{
    \App\Libs\Module::output($position);
}

function script($script)
{
    $script = rtrim($script, ".js");
    echo "<script src='$script.js' type='text/javascript'></script>";
}

function stylesheet($style)
{
    $style = rtrim($style, ".css");
    echo "<link rel='stylesheet' type='text/css' href='$style.css'>";
}

function route_is($req)
{
    return \App\Libs\Request::is($req);
}

function redirect($url)
{
    if (substr($url, 0, 4) == "http") {
        header("Location: $url");
    } else {
        header("Location: " . route($url));
    }
    exit;
}

function flash_show()
{
    \App\Libs\Flash::showAll();
}

function data_valueOf($field)
{
    return \App\Libs\Data::create()->value($field);
}

function data_clear()
{
    return \App\Libs\Data::create()->clear();
}