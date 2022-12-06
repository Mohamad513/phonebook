<?php
namespace App\Controllers;

class ArchiveController{

    public function index(){
        view("archive.archive");
    }

    public function products(){
        view("archive.products");
    }

    public function articles(){
        view("archive.articles");
    }

}