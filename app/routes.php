<?php

use App\Libs\Router;
use App\Modules\OurClients;
use App\Modules\LatestPosts;

$router = new Router();

$router->get("/")->target("PagesController@index")->modules([
    "pre-footer" => new OurClients(),
    "middle-right" => new LatestPosts()
])->add();

$router->get("about")->target("PagesController@about")
    ->modules([
        "pre-footer" => new OurClients()
    ])->add();

$router->get("/contact")->controller("PagesController")->action("contact")
    ->add();

$router->post("/contact")->controller("PagesController")->action("postContact")
    ->add();