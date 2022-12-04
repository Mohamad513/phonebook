<?php

namespace App\Utilities;

class asset {

    public static function get(string $route){
        return $_ENV["HOST"] . 'assets/' . $route;  
    }

}