<?php
namespace App\Controllers;

use App\Commons\Controller;

class HomeController extends Controller {

    public function home(){
        $this->view('views/home');
    }

    public function homeId($id){
        var_dump("Hello i am the /home/$id controller");
    }
}