<?php
use App\Libs\Request;
use App\Libs\Middleware;

Middleware::add("auth", function (Request $request) {
    return true;
});