<?php 


class Controller{
  
  function renderView(string $view, $params = null, $styles = null, $titulo = null){
    require_once '../app/views/templates/layout.phtml' ;
  }
}