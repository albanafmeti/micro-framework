<?php
use App\Libs\Request;
use App\Libs\Filter;

Filter::add("auth", function (Request $request) {
    $authenticated = true;

    if (!$authenticated) {
        redirect("/login");
    }
});