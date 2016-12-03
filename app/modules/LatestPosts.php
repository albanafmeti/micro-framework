<?php

namespace App\Modules;

use App\Libs\ModuleInterface;
use App\Libs\Module;
use App\Libs\Request;

class LatestPosts extends Module implements ModuleInterface
{

    public function execute(Request $request)
    {
        $content = $this->view->render("modules/latest-posts", [], true);
        $this->setContent($content);
    }
}