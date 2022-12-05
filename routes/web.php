<?php

use App\Core\Routing\Route;

Route::get('/','HomeController@index');

Route::get('/a',function(){
    echo "wellcome";
});

Route::get('/saveForm',function(){
    echo "save ok";
});

Route::put('/puturi','controller','method');

Route::put('/puturi','controller@method');