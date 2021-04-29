<?php

class Core
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // echo var_dump($url);
        if (empty($url[0])) {
          require_once '../app/controllers/homeController.php';
          (new HomeController())->index();
          return false;
        }

        $path_controller = '../app/controllers/' . $url[0] . 'Controller.php';
        if (file_exists($path_controller)) {
            require_once $path_controller;
            $controller_name = $url[0] . 'Controller';
            // (new $controller_name())->index();
            // echo "El controlador {$url[0]} existe";

            //para los metodos si existen
						$size = count($url); 
            if($size >=2){
							if(method_exists($controller_name,$url[1])){
								if($size >= 3){
									$param = [];
									for ($i=2; $i < $size; $i++) { 
										array_push($param,$url[$i]);
									}
								}else{
									(new $controller_name)->{$url[1]}();
								}
							}else{
								echo "No existe la accion especificada {$url[1]}";
							}

            }else{
							(new $controller_name)->index();
						}
        } else {
            echo "El controlador {$url[0]} no existe";
        }
    }
}
