<?php

function siteurl($route){
    return $_ENV["HOST"] . $route;  
}