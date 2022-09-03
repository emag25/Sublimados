<?php

class ContactoController {

    private $model;
    
    public function __construct() {    }

    public function index() {      
      require_once VCONTACTO.'principal.php';
    }   
    
    public function view_new() {      
      require_once VCONTACTO.'new.php';
    }

    public function view_list() {      
      require_once VCONTACTO.'list.php';
    }

    public function view_edit() {      
      require_once VCONTACTO.'edit.php';
    }
}
