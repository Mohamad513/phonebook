<?php
namespace App\Controllers;

class PostController{

    public function single(){
        global $reguest;
        $slug = $reguest->get_route_param('slug');
        $cid = $reguest->get_route_param('cid');
        echo "slug:" . $slug . "<br>" . "cid:" . $cid;
    }

}