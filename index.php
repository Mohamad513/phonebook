<?php
#front controller

use App\Core\Routing\Route;
use App\Core\Routing\Router;

include "bootstrap/init.php";

$router = new Router();
$router->run();
