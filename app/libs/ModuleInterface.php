<?php

namespace App\Libs;

interface ModuleInterface
{
    public function execute(Request $request);
}