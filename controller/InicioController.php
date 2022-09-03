<?php

class InicioController {

    private $model;
    
    public function __construct() {    }

    public function index() {
      require_once VINICIO.'principal.php';
    }     
}
