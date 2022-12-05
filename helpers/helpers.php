<?php

function siteurl($route){
    return $_ENV["HOST"] . $route;  
}
function view($path){
    $path =str_replace('.','/',$path);
    $view_full_path = BASEPATH . "/views/$path.php";
    include_once $view_full_path;    
}