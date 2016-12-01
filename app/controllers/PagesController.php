<?php

use App\Libs\Controller;
use App\Libs\Request;
use App\Libs\Validation;
use App\Libs\Flash;
use Illuminate\Database\Capsule\Manager as DB;

class PagesController extends Controller
{

    public function index()
    {
        $this->view->render("index");
    }

    public function about()
    {
        $this->view->render("about");
    }


    public function contact()
    {
        $this->view->render("contact");
    }

    public function postContact(Request $request)
    {
        Validation::create()->check($request, [
            "name" => "required",
            "email" => "required | email",
            "message" => "required",
        ])->action("contact");

        //Send Mail
        Flash::addMessage("Message sent successfully!");

        redirect("contact");
    }

}