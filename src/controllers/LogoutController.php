<?php 
namespace App\Controllers;

use App\Commons\Controller;

class LogoutController extends Controller {
    public function logout() {
        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Unset and destroy session data
        session_unset();
        session_destroy();

        // Redirect to home page or login page after logout
        header("Location: /login");
        exit();
    }
}
