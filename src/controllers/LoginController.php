<?php 
namespace App\Controllers;

use App\Commons\Controller;
use App\Models\UserModel;
use Exception;

class LoginController extends Controller {
    private $repository;

    public function __construct() {
        $this->repository = new UserModel();
    }

    public function login() {
        // Start session to manage user login state
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['submit'])) {
            try {
                $user = $this->repository->login($_POST); // Fetch user details
                if ($user) {
                    // Set the session variables
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_name'] = $user['name']; // Assuming 'name' field exists in the user table
                    
                    // Redirect to home page or dashboard after successful login
                    header("Location: /");
                    exit();
                } else {
                    // Display error message if login failed
                    $this->view('views/login', ['message' => 'Échec de la connexion. Vérifiez vos identifiants']);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            // Show the login form
            $this->view('views/login', ['message' => ' ']);
        }
    }
}
