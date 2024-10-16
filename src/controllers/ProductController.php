<?php
namespace App\Controllers;

use App\Commons\Controller;

class ProductController extends Controller {

    public function product(){
        $this->view('views/product');
    }

    public function homeId($id){
        var_dump("Hello i am the /home/$id controller");
    }
}