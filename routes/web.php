<?php

use App\Core\Routing\Route;

Route::get('/null');

Route::get('/a',function(){
    echo "wellcome";
});

Route::post('/saveForm',function(){
    echo "save ok";
});

Route::put('/puturi','controller','method');

Route::put('/puturi','controller@method');