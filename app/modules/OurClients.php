<?php
namespace App\Modules;

use App\Libs\ModuleInterface;
use App\Libs\Module;
use App\Libs\Request;

class OurClients extends Module implements ModuleInterface
{

    public function execute(Request $request)
    {
        $content = $this->view->render("modules/our-clients", [], true);
        $this->setContent($content);
    }
}