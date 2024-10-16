<?php
require '../../vendor/autoload.php';

use App\Commons\Router;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\ContactController;
use App\Controllers\LogoutController;
use App\Controllers\ProductController;
use App\Controllers\RegisterController;

$router = new Router();

$router->addRoute('/', HomeController::class, 'home');
$router->addRoute('/home/(\d+)', HomeController::class, 'homeId');
$router->addRoute('/register', RegisterController::class, 'register');
$router->addRoute('/login', LoginController::class, 'login');
$router->addRoute('/logout', LogoutController::class, 'logout');
$router->addRoute('/product', ProductController::class, 'product');
$router->addRoute('/contact', ContactController::class, 'contact');
$uri =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($uri);