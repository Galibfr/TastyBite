<?php
namespace App\Controllers;

use App\Commons\Controller;
use App\Models\ProductModel;

class HomeController extends Controller {
    private ProductModel $repository;

    public function __construct() {
        // Initialize the ProductModel
        $this->repository = new ProductModel();
    }

    public function home() {
        // Call getAllDishes to retrieve products
        $allDishes = $this->repository->getAllDishes();
        $this->view('views/home', ['dishes' => $allDishes]);
    }

    public function addToCart($id) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Start session if not already started
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;  // Increase quantity if product is already in cart
        } else {
            // Fetch product details from the database
            $product = $this->repository->getDishById($id);

            // Check if the product exists
            if ($product) {
                $_SESSION['cart'][$id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => 1
                ];
                echo json_encode(['status' => 'success', 'message' => 'Product added to cart', 'cart' => $_SESSION['cart']]);
                return;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Product not found']);
                return;
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'Product quantity updated', 'cart' => $_SESSION['cart']]);
    }
}
