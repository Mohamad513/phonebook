<?php

use App\Core\SimpleRouter;

include "bootstrap/init.php";
#front controller
$router = new SimpleRouter();
$router->run();

