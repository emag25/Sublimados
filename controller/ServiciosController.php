<?php

class ServiciosController {

    private $model;
    
    public function __construct() {    }

    public function index() {      
      require_once VSERVICIOS.'servicios.principal.php';
    }

    // DOMICILIO
    public function view_domicilio_new() {      
      require_once VSERVICIOS.'domicilio/domicilio.new.php';
    }

    public function view_domicilio_list() {      
      require_once VSERVICIOS.'domicilio/domicilio.list.php';
    }

    public function view_domicilio_edit() {      
      require_once VSERVICIOS.'domicilio/domicilio.edit.php';
    }




    // INTERNACIONAL
    public function view_internacional_new() {      
      require_once VSERVICIOS.'internacional/internacional.new.php';
    }

    public function view_internacional_list() {      
      require_once VSERVICIOS.'internacional/internacional.list.php';
    }

    public function view_internacional_edit() {      
      require_once VSERVICIOS.'internacional/internacional.edit.php';
    }

    
}
