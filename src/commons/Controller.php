<?php
namespace App\Commons;

abstract class Controller {

    protected function view($view, $datas = [], $layout = 'layouts/main'){
        $view = new View($view, $datas, $layout);
        $view->render();
    }

    protected function redirect($uri){

            header("location:$uri");
            exit;
    }
}