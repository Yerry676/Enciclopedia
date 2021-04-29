<?php

class HomeController extends Controller
{
    public function index()
    {
       // require_once("../app/views/home/index.php");
        $this->renderView("home/index");
    }
}
