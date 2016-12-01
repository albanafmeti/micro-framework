<?php


function route($path, Array $params = null)
{
    $prm = "";
    if (!is_null($params)) {
        foreach ($params as $param) {
            $prm .= "/" . $param;
        }
    }

    return 'http://' . $_SERVER['HTTP_HOST'] . '/' . ltrim($path, "/") . $prm;
}

function module($position)
{
    \App\Libs\Module::output($position);
}

function script($script)
{
    echo "<script src='$script.js'></script>";
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

    exit();
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