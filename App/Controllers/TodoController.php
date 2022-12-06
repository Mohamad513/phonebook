<?php
namespace App\Controllers;

class TodoController{

    public function list(){
        $data = [
            'tasks' => ['first tasks' , 'second tasks' , '3th tasks'],
            'title' => 'لیست تسک ها'
        ];

        view("todo.list",$data);

    }

}