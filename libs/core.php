<?php

class Core
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
                
        if (empty($url[0])) {
            require_once '../app/controllers/homeController.php';
            (new HomeController())->index();
            return false;
        }

        $path_controller = '../app/controllers/' . $url[0] . 'Controller.php';
        if (file_exists($path_controller)) {
            require_once $path_controller;
            $controller_name = $url[0] . 'Controller';
            $controller = new $controller_name();
            echo "El controlador {$url[0]} existe";
        } else {
            echo "El controlador {$url[0]} no existe";
        }
    }
}
