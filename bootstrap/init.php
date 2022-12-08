<?php
use App\Core\Requset;

define('BASEPATH',__DIR__ . "/../");

include BASEPATH . "/vendor/autoload.php";
include BASEPATH . "/helpers/helpers.php";
include BASEPATH . "/routes/web.php";   

$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

$reguest = new Requset();

 



