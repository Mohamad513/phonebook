<?php

namespace App\Middleware;
use hisorange\BrowserDetect\Parser as Browser;

use App\Middleware\Contract\MiddlewareIntrface;
use EnchantBroker;

class BlockFirefox implements MiddlewareIntrface{

    public function handle(){
        global $reguest;
        if(Browser::isFirefox())
        die("Firefox Was Blocked !!!");
    }

}