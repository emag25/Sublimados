<?php

require_once 'model/dao/DomicilioDAO.php';
require_once 'model/dto/Domicilio.php';

class ServiciosController {

    private $model;
    
    public function __construct() { $this->model=new DomicilioDAO();}

    public function index() {      
      require_once VSERVICIOS.'servicios.principal.php';
    }

    // DOMICILIO
    public function view_domicilio_new() {      
      require_once VSERVICIOS.'domicilio/domicilio.new.php';
    }

    public function view_domicilio_new_producto() {      
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ header('');}
          if (!empty($_POST['cedula']) && !empty($_POST['celular']) && !empty($_POST['correo']) && 
          !empty($_POST['cities']) && !empty($_POST['postal']) && !empty($_POST['gen']) 
          && !empty($_POST['env']) && !empty($_POST['referencias'])) {
            $prod = new Domicilio();
            // lectura de parametros
            $prod->setCedula(htmlentities($_POST['cedula']));
            $prod->setCelular(htmlentities($_POST['celular']));
            $prod->setCorreo(htmlentities($_POST['correo']));
            $env_array = $_POST['env'];
            $env="";
                  foreach($env_array as $opcion){
                      $env.=$opcion." ";
                  }
            $prod->setTipoEnvio(htmlentities($_POST['gen']));
            $prod->setProductos(htmlentities($env));
            $prod->setCiudad(htmlentities($_POST['cities'])); 
            $prod->setPostal(htmlentities($_POST['postal'])); 
            $prod->setReferencias(htmlentities($_POST['referencias'])); 
          
            //comunicar con el modelo
            $exito = $this->model->insert($prod);

            $msj = 'Domicilio guardadao exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            $resultados = $this->model->selectAll();  
            require_once VSERVICIOS.'domicilio/domicilio.list.php';
          } 
        }
    }

    public function view_domicilio_search(){
            // lectura de parametros enviados
      $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectMatches($parametro);
      // comunicarnos a la vista
      require_once VSERVICIOS.'domicilio/domicilio.list.php';
    }

    public function view_domicilio_list() {      
      $resultados = $this->model->selectAll();        
      require_once VSERVICIOS.'domicilio/domicilio.list.php';
    }
    
    public function view_domicilio_edit() {      
      $id = $_REQUEST['id'];     
      $prod = $this->model->selectById($id);

      require_once VSERVICIOS.'domicilio/domicilio.edit.php';
    }

    public function view_domicilio_edit_producto(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        if (!empty($_POST['cedula']) && !empty($_POST['celular']) && !empty($_POST['correo']) && 
        !empty($_POST['cities']) && !empty($_POST['postal']) && !empty($_POST['gen']) 
        && !empty($_POST['env']) && !empty($_POST['referencias'])) {
          
          $prod = new Domicilio();

          $prod->setDomicilioId(htmlentities($_POST['id']));
          $prod->setCedula(htmlentities($_POST['cedula']));
          $prod->setCelular(htmlentities($_POST['celular']));
          $prod->setCorreo(htmlentities($_POST['correo']));
          $env_array = $_POST['env'];
          $env="";
                foreach($env_array as $opcion){
                    $env.=$opcion." ";
                }
          $prod->setTipoEnvio(htmlentities($_POST['gen']));
          $prod->setProductos(htmlentities($env));
          $prod->setCiudad(htmlentities($_POST['cities'])); 
          $prod->setPostal(htmlentities($_POST['postal'])); 
          $prod->setReferencias(htmlentities($_POST['referencias'])); 
        
          $exito = $this->model->update($prod);

          $msj = 'Domicilio guardado exitosamente';
          $color = 'primary';
          if ($exito) {
              $msj = "No se pudo realizar el guardado";
              $color = "danger";            
          }
          if (!isset($_SESSION)) {
              session_start();
          }
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
   
          header('Location:index.php?c=servicios&f=view_domicilio_list');
        } 
      } 
    }

    public function view_domicilio_delete() {  
      $id=$_GET["id"]; 
      $prod = new Domicilio();
      $prod->setDomicilioId($id);
      $result_delete=$this->model->eliminar($prod);  
      $resultados = $this->model->selectAll();
      require_once VSERVICIOS.'domicilio/domicilio.list.php';
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
