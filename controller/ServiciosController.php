<?php
require_once 'model/dao/InternacionalDAO.php';
require_once 'model/dto/Internacional.php';

require_once 'model/dao/DomicilioDAO.php';
require_once 'model/dto/Domicilio.php';


class ServiciosController {

    private $model;
    private $model2;

    
   
    public function __construct() { 
        $this->model=new DomicilioDAO();
        $this->model2 = new InternacionalDAO();
    }

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
      $modeloInternacional = new InternacionalDAO();    
     require_once VSERVICIOS.'internacional/internacional.new.php';
    }

    public function int_new() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
        $inter = new Internacional();
        
        $inter->setNombre(htmlentities($_POST['nombres']));
        $inter->setApellido(htmlentities($_POST['apellidos']));
        $inter->setTelefono(htmlentities($_POST['telefono']));
        $inter->setEmail(htmlentities($_POST['email']));
        $inter->setDireccion(htmlentities($_POST['direccion']));
        
        if (htmlentities($_POST['radio']) == "S") {
          $inter->setVia("Servientrega");
        }else if (htmlentities($_POST['radio']) == "T"){
          $inter->setVia("Tramaco");
        }else if(htmlentities($_POST['radio']) == "M"){
          $inter->setVia("MundoExpress");
        }
        if (htmlentities($_POST['destino']) == 1) {
          $inter->setPais("Panamá");
        }else if (htmlentities($_POST['destino']) == 2){
          $inter->setPais("Chile");
        }else if(htmlentities($_POST['destino']) == 3){
          $inter->setPais("Colombia");
        }else if(htmlentities($_POST['destino']) == 4){
          $inter->setPais("Perú");
        }
        if (isset($_POST['recibir_info'])) {
          $inter->setinfo(1);
        }else{
          $inter->setinfo(0);
        }
  
     $inter->setesp(htmlentities($_POST['especificaciones']));
              
        $exito = $this->model2->insert($inter);
              
        if(!isset($_SESSION)){ 
          session_start();
        };
  
        if ($exito) {
          $_SESSION['mensaje'] = "Envío guardada exitosamente!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo guardar el envío. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
  
        header('Location:index.php?c=Servicios&f=view_internacional_list');
      }
    }
   

    public function view_internacional_list() {  
      $resultados = $this->model2->selectAll();       
      require_once VSERVICIOS.'internacional/internacional.list.php';
    }

    public function int_search() {
      $name = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
  
      if (empty($name)) {
        
        if(!isset($_SESSION)){ 
          session_start();
        }
        $_SESSION['mensaje'] = "ERROR: Debe ingresar un nombre.";
        $_SESSION['color'] = "rojo";
        
        $resultados = $this->model2->selectAll();
      
      }else{
        $resultados = $this->model2->selectByName($name);
        if (count($resultados)==0) {
          if(!isset($_SESSION)){ 
            session_start();
          }
          $_SESSION['mensaje'] = "ERROR: Nombre de usuario no encontrado.";
          $_SESSION['color'] = "rojo";
          $resultados = $this->model2->selectAll();
        }
      }
      
      require_once VSERVICIOS.'internacional/internacional.list.php';
    }


    public function view_internacional_edit() {   
      $id = $_REQUEST['id'];     
      $inter = $this->model2->selectById($id);
     
      require_once VSERVICIOS.'internacional/internacional.edit.php';
    }

    public function int_edit(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
        $inter = new Internacional();
        $id= $_REQUEST['id'];
        $inter->setInternacionalId($id);
        $inter->setNombre(htmlentities($_POST['nombre']));
        $inter->setApellido(htmlentities($_POST['apellido']));
        $inter->setTelefono(htmlentities($_POST['telefono']));
        $inter->setEmail(htmlentities($_POST['email']));
        $inter->setDireccion(htmlentities($_POST['direccion']));      
        
        if (htmlentities($_POST['radio']) == "S") {
          $inter->setVia("Servientrega");
        }else if (htmlentities($_POST['radio']) == "T"){
          $inter->setVia("Tramaco");
        }else if(htmlentities($_POST['radio']) == "M"){
          $inter->setVia("MundoExpress");
        }
  
        if (htmlentities($_POST['destino']) == 1) {
          $inter->setPais("Panamá");
        }else if (htmlentities($_POST['destino']) == 2){
          $inter->setPais("Chile");
        }else if(htmlentities($_POST['destino']) == 3){
          $inter->setPais("Colombia");
        }else if(htmlentities($_POST['destino']) == 4){
          $inter->setPais("Perú");
        }
  
        
        if (isset($_POST['recibirinfo'])) {
          $inter->setinfo(1);
        }else{
          $inter->setinfo(0);
        }

        $inter->setesp(htmlentities($_POST['especificaciones']));

        
        $exito = $this->model2->update($inter);
        if(!isset($_SESSION)){ 
          session_start();
        }
  
        if ($exito) {
          $_SESSION['mensaje'] = "Envío modificado exitosamente!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo guardar el envío. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
  
        header('Location:index.php?c=Servicios&f=view_internacional_list');
      } 
    }
  

  
    public function int_delete(){
    
      $id= $_REQUEST['id'];
      $inter = new Internacional();
      $inter->setInternacionalId(htmlentities($_REQUEST['id']));
      $exito = $this->model2->delete($inter);
      
      if(!isset($_SESSION)){ 
        session_start();
      }
  
      if ($exito) {
        $_SESSION['mensaje'] = "Envío eliminado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo eliminar el envío. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
  
      header('Location:index.php?c=Servicios&f=view_internacional_list');    
    }
  
}


