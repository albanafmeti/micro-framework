<?php

use App\Libs\Controller;
use App\Libs\Request;
use App\Libs\View;

class AuthController extends Controller
{

    public function login()
    {
        View::create("login")->render();
    }

    public function authenticate(Request $request)
    {
        echo '<pre>';
        var_dump($request);
        exit;
    }

}