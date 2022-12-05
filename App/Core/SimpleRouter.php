<?php

namespace App\Core;
use App\Utilities\url;

class SimpleRouter{
    private $routes;
    public function __construct(){
    $this->routes = [
        '/' => 'home/index.php',
        '/colors/blue' => 'colors/blue.php',
        '/colors/red' => 'colors/red.php',
        '/colors/green' => 'colors/green.php'
    ];    
}
    public function run(){
        $curent_route = url::curent_route();
        foreach($this->routes as $route => $view){
            if($curent_route == $route)
                $this->includeAndDie(BASEPATH ."views/$view");
        }
    #header 404
    header('HTTP/1.0 404 Not Found');
    $this->includeAndDie(BASEPATH ."views/errors/404.php");

    }
    private function includeAndDie($viewPath){
        include $viewPath;
        die();
    }
}