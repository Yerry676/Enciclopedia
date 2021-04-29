<?php 


class Controller{
  
  function renderView(string $view){
    require_once '../app/views/' . $view . ".phtml";
  }
}