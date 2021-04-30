<?php

class HomeController extends Controller
{
    public function index()
    {
        $styles = [
            'test/suma.css'
        ];
       // require_once("../app/views/home/index.php");
        $this->renderView( view: "home/index",styles: $styles, titulo: "Home");
    }
}
