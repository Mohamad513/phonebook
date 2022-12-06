<?php

use App\Core\Routing\Route;

Route::get('/','HomeController@index');
Route::get('/todo/list','TodoController@list');

Route::get('/archive','ArchiveController@index');
Route::get('/archive/products','ArchiveController@products');
Route::get('/archive/articles','ArchiveController@articles');

Route::get('/a',function(){
    echo "wellcome";
});

Route::get('/saveForm',function(){
    echo "save ok";
});

Route::put('/puturi','controller','method');

Route::put('/puturi','controller@method');