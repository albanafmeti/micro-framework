<?php

use App\Libs\Controller;
use App\Models\User;
use App\Libs\Request;

class HomeController extends Controller
{

    public function preload_index()
    {
    }

    public function index()
    {
        $this->view->render("index");
    }

    public function hello(Request $request, $name)
    {

        if ($request->has("name")) {
            echo "Hello " . $request->input("name");
        } else {
            echo "Hello " . $name;
        }

    }
}