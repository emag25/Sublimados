<?php

class ProductosController {

    private $model;
    
    public function __construct() {    }

    public function index() {      
      require_once VPRODUCTOS.'principal.php';
    } 
    
    public function view_new() {      
      require_once VPRODUCTOS.'new.php';
    }

    public function view_list() {      
      require_once VPRODUCTOS.'list.php';
    }

    public function view_edit() {      
      require_once VPRODUCTOS.'edit.php';
    }
}
