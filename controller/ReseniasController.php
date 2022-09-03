<?php

class ReseniasController {

    private $model;
    
    public function __construct() {    }

    public function index() {      
      require_once VRESENIAS.'principal.php';
    }     

    public function view_new() {      
      require_once VRESENIAS.'new.php';
    }

    public function view_list() {      
      require_once VRESENIAS.'list.php';
    }

    public function view_edit() {      
      require_once VRESENIAS.'edit.php';
    }
}
