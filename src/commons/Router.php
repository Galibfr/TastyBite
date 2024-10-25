<?php
namespace App\Commons;

use App\Infrastructure\Interfaces\RouterInterface;

class Router implements RouterInterface {
    private $routes = [];
    public function addRoute(String $uri, String $Controller, String $method){
        $this->routes[$uri] = ['Controller' => $Controller, 'method' => $method];
    }
    
    public function dispatch(String $uri) {
        $routeFound = false;  // Add a flag to check if a route matches
        foreach($this->routes as $uriPath => $infos) {
            extract($infos);
            $matchedUri = preg_match("#^$uriPath$#", $uri, $matches);
            if ($matchedUri) {
                $routeFound = true;  // A route was found
                if (class_exists($Controller)) {
                    $controller = new $Controller();
                    if (method_exists($controller, $method)) {
                        if (isset($matches[1])) {
                            $controller->$method($matches[1]);
                        } else {
                            $controller->$method();
                        }
                    } else {
                        // Method not found in the controller
                        echo "Error: Method $method not found in $Controller.";
                    }
                } else {
                    // Controller class not found
                    echo "Error: Controller $Controller not found.";
                }
                break;  // Exit loop once a route is matched
            }
        }
        
        if (!$routeFound) {
            // No route matched, handle the 404 error here
            http_response_code(404);
            require_once __DIR__.'/../public/views/404.php';
        }
    }
}    