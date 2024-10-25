<?php
namespace App\Controllers;

use App\Commons\Controller;
use App\Models\ProductModel;

class ProductController extends Controller {
    private array $cart;
    private ProductModel $repository;

    public function __construct()
    {
        $_SESSION['cart'] = array();
        $this->cart = $_SESSION['cart'];
        $this->repository = new ProductModel();
    }

    public function product(){
        $AllDishes = $this->repository->getAllDishes();
        $this->view('views/product', ['datas' => $AllDishes]);
    }

    public function addToCart($id){
        // array_push($this->cart, $item);
        return $this->cart;
    }

    public function homeId($id){
        var_dump("Hello i am the /home/$id controller");
    }
}

