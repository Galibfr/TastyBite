<?php
namespace App\Controllers;

use App\Commons\Controller;

class ContactController extends Controller {

    public function contact(){
        $this->view('views/contact');
    }

    public function homeId($id){
        var_dump("Hello i am the /home/$id controller");
    }
}