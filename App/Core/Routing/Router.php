<?php

namespace App\Core\Routing;
use App\Core\Requset;
use App\Core\Routing\Route;

class Router{

    private $request;
    private $routes;
    private $current_route;
    const BASE_CONTROLLER = "App\Controllers\\";

    public function __construct(){

        $this->request = new Requset();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null ;
        $this->run_route_middleware();
        // var_dump($this->current_route);
    }  
        
    private function run_route_middleware(){
        $middleware = $this->current_route['middleware'] ?? [];
        foreach($middleware as $middlewre_class){
            $middleware_obj = new $middlewre_class();
            $middleware_obj->handle();
        }

    }

    public function findRoute(Requset $request){

        foreach ($this->routes as $route){
            if (!in_array($request->method(),$route['methods'])){
                return false;
            }
            if($this->regex_matched($route)){
                return $route;
            }
        }
        return null;
    }

    public function regex_matched($route){
        global $reguest;
        $pattern = "/^".str_replace(['/','{','}'],['\/','(?<','>[-%\w]+)'],$route['uri'])."$/";
        $result = preg_match($pattern,$this->request->uri(),$matches);
        if (!$result) {
            return false;
        }
        foreach($matches as $key => $value){
            if(!is_int($key))
                $reguest->add_route_param($key,$value);
        }
        return true;
    }

    public function dispatch404(){
        header('HTTP/1.0 404 Not Found');
        view('errors.404');
        die();
    }

    public function run(){
        if(is_null($this->current_route))
            $this->dispatch404();
    $this->dispatch($this->current_route);
    }

    private function dispatch($route){
        $action = $route['action'] ?? null;
        if(is_null('action') || empty('action'))
        return;

        if(is_callable($action)){
            $action();
            // call_user_func($action);
        }

        if(is_string($action))
            $action = explode('@',$action);
        
            if(is_array($action)){
            $class_name = self::BASE_CONTROLLER . $action[0];
            $method = $action[1];
            
            if(!class_exists($class_name))
                throw new \Exception("class $class_name Not Exists");
                
            $controller = new $class_name();


            if(!method_exists($controller,$method))
            throw new \Exception("method $method Is Not Exists In $class_name Not ");
            $controller->{$method}();
            
        }
    }
}