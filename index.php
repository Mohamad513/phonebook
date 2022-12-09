<?php
#front controller

// use App\Core\Routing\Route;
use App\Core\Routing\Router;

use App\Models\User;

include "bootstrap/init.php";

$user_data = [
    "id" => rand(4,10),
    "name" => "milad"

]; 

$user_model = new User;
// $user_model->create($user_data);
$user = $user_model->find(2);
var_dump($user);
// $router = new Router();
// $router->run();
