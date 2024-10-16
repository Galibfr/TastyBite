<?php
namespace App\Infrastructure\Interfaces;

interface RouterInterface {
    public function addRoute(String $uri, String $Controller, String $method);
    public function dispatch(String $uri);
}