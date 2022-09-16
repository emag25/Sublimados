<?php // AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER 

require_once 'model/dao/DomicilioDAO.php';
require_once 'model/dto/Domicilio.php';


class DomiciliosController {

  private $model;
  
  public function __construct() { 
      $this->model=new DomicilioDAO();
  }

  public function index() {  
    require_once VSERVICIOS.'servicios.principal.php';
  }

  /* -------------------------------------------- DOMICILIO  ------------------------------------------ */
  
  //    INSERTAR
  
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

        if(!isset($_SESSION)){ 
          session_start();
        }
    
        if ($exito) {
          $_SESSION['mensaje'] = "Domicilio guardado exitosamente!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo guardar el domicilio. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
  
        if(($_SESSION['rol']=="cliente") or ($_SESSION['rol']=="marketing")){
          header('Location:index.php?c=Inicio&f=index');
        }else{
          header('Location:index.php?c=domicilios&f=view_domicilio_list');
        }        
      } 
    }
  }


  //    CONSULTAR 
  
  public function view_domicilio_search(){
          // lectura de parametros enviados
    $parametro = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";
    //comunica con el modelo (enviar datos o obtener datos)
    $resultados = $this->model->selectMatches($parametro);
    // comunicarnos a la vista
    echo json_encode($resultados);  
  }

  public function view_domicilio_list() {      
    $resultados = $this->model->selectAll();        
    require_once VSERVICIOS.'domicilio/domicilio.list.php';
  }
  

  //    EDITAR

  public function view_domicilio_edit() {      
    $id = $_REQUEST['id'];     
    $prod = $this->model->selectById($id);

    require_once VSERVICIOS.'domicilio/domicilio.edit.php';
  }

  public function view_domicilio_edit_producto(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if (!empty($_POST['cedula']) && !empty($_POST['celular']) && !empty($_POST['correo']) && 
      !empty($_POST['cities']) && !empty($_POST['postal']) && !empty($_POST['gen']) 
      && !empty($_POST['env']) && !empty($_POST['referencias'])&& !empty($_POST['usuario_id'])) {
        
        $prod = new Domicilio();
        $prod->setUsuarioId(htmlentities($_POST['usuario_id']));
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

        if(!isset($_SESSION)){ 
          session_start();
        }
    
        if ($exito) {
          $_SESSION['mensaje'] = "Domicilio editado exitosamente!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo editar el domicilio. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
  
        header('Location:index.php?c=domicilios&f=view_domicilio_list');
      } 
    } 
  }


  //     ELIMINAR 

  public function view_domicilio_delete() {  
    $id=$_GET["id"]; 
    $prod = new Domicilio();
    $prod->setDomicilioId($id);
    $exito=$this->model->eliminar($prod);  
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if ($exito) {
      $_SESSION['mensaje'] = "Domicilio eliminado exitosamente!";
      $_SESSION['color'] = "azul";
    }else{
      $_SESSION['mensaje'] = "ERROR: No se pudo eliminar el domicilio. Intentalo de nuevo.";
      $_SESSION['color'] = "rojo";
    }

    header('Location:index.php?c=domicilios&f=view_domicilio_list');
  }

}


