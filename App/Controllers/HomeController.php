<?php
namespace App\Controllers;

use App\Models\Contact;

class HomeController{

    private $contactModel ;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function index(){

        $data = [
            'contacts' => $this->contactModel->getAll()
        ];
        view('home.index',$data);

    }

}

// $faker = \Faker\Factory::create();

// for($i=0 ; $i < 500 ; $i++){

//     $this->contactModel->create([

//         "name" => $faker->name(),
//         "mobile" => $faker->phoneNumber(),
//         "email" => $faker->email(),

//     ]);

// }
