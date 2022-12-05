<?php

namespace App\Core\Routing;
use App\Core\Requset;

class Router
{
    private $request;
    private $routes;
    private $current_route;

    public function __construct()
    {
        $this->request = new Requset();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null ;
        var_dump($this->current_route);
    }

    public function findRoute(Requset $request)
    {
        echo $request->method() . "" . $request->uri();
        foreach ($this->routes as $route) {
            if (in_array($request->method(),$route['methods']) && $request->uri() == $route['uri']) {
                return $route;
            }
        }
        return null;
    }

    public function run(){

    }
}