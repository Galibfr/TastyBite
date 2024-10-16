<?php
namespace App\Commons;

use App\Infrastructure\Interfaces\RouterInterface;

class Router implements RouterInterface {
    private $routes = [];
    public function addRoute(String $uri, String $Controller, String $method){
        $this->routes[$uri] = ['Controller' => $Controller, 'method' => $method];
    }
    
    public function dispatch(String $uri){
        foreach($this->routes as $uriPath => $infos){
            extract($infos);
            $matchedUri = preg_match("#^$uriPath$#", $uri, $matches);
            if($matchedUri){
                if(isset($matches[1])){
                    $controller = new $Controller();
                    $controller->$method($matches[1]);
                } else {
                    $controller = new $Controller();
                    $controller->$method();
                }
            }
        }
    }
}