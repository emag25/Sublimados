<!--  AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->

<?php

require_once 'model/dao/ReseniasDAO.php';
require_once 'model/dto/Resenia.php';

class ReseniasController {

  private $model;
  
  public function __construct() {
    $this->model = new ReseniasDAO();
  }

  public function index() { 
    $resultados = $this->model->selectByState();
    require_once VRESENIAS.'principal.php';
  }


  /*--  CONSULTAR RESEÑA  --*/

  public function view_list() {   
    $resultados = $this->model->selectAll();   
    require_once VRESENIAS.'list.php';
  }

  public function search() {
    $name = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";

    if (empty($name)) {
      
      if(!isset($_SESSION)){ 
        session_start();
      }
      $_SESSION['mensaje'] = "ERROR: Debe ingresar un nombre.";
      $_SESSION['color'] = "rojo";
      
      $resultados = $this->model->selectAll();
    
    }else{
      $resultados = $this->model->selectByName($name);
      if (count($resultados)==0) {
        if(!isset($_SESSION)){ 
          session_start();
        }
        $_SESSION['mensaje'] = "ERROR: Nombre de autor de la reseña no encontrado.";
        $_SESSION['color'] = "rojo";
        $resultados = $this->model->selectAll();
      }
    }
    
    require_once VRESENIAS.'list.php';  
  }




  /*--  INSERTAR RESEÑA  --*/

  public function view_new() {  
    $modeloResenia = new ReseniasDAO();    
    require_once VRESENIAS.'new.php';
  }

  public function new() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      $res = new Resenia();
      
      $res->setNombre(htmlentities($_POST['nombre']));
      $res->setEmail(htmlentities($_POST['email']));
      $res->setValoracion(htmlentities($_POST['valoracion']));      
      
      if (htmlentities($_POST['radio']) == 1) {
        $res->setServicio("A domicilio");
      }else if (htmlentities($_POST['radio']) == 2){
        $res->setServicio("Internacional");
      }

      $res->setResenia(htmlentities($_POST['nuevaResenia']));
      
      if (isset($_POST['recibiremail'])) {
        $res->setRecibirPromo(1);
      }else{
        $res->setRecibirPromo(0);
      }
            
      $exito = $this->model->insert($res);
            
      if(!isset($_SESSION)){ 
        session_start();
      };

      if ($exito) {
        $_SESSION['mensaje'] = "Reseña guardada exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar la reseña. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }

      header('Location:index.php?c=Resenias&f=view_list');
    }
  }
  



  /*--  EDITAR RESEÑA  --*/

  public function view_edit() {   
    $id = $_REQUEST['id'];     
    $res = $this->model->selectById($id);

    require_once VRESENIAS.'edit.php';
  }

  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
      $res = new Resenia();

      $res->setReseniaId(htmlentities($_POST['id']));
      $res->setNombre(htmlentities($_POST['nombre']));
      $res->setEmail(htmlentities($_POST['email']));
      $res->setValoracion(htmlentities($_POST['valoracion']));      
      
      if (htmlentities($_POST['radio']) == 1) {
        $res->setServicio("A domicilio");
      }else if (htmlentities($_POST['radio']) == 2){
        $res->setServicio("Internacional");
      }

      $res->setResenia(htmlentities($_POST['nuevaResenia']));
      
      if (isset($_POST['recibiremail'])) {
        $res->setRecibirPromo(1);
      }else{
        $res->setRecibirPromo(0);
      }
      
      $exito = $this->model->update($res);
      if(!isset($_SESSION)){ 
        session_start();
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Reseña editada exitosamente!";
        $_SESSION['color'] = "azul";        
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo editar la reseña. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }

      header('Location:index.php?c=Resenias&f=view_list');
    } 
  }





  /*--  ELIMINAR RESEÑA  --*/

  public function delete(){
    
    $id= $_REQUEST['id'];
    $res = new Resenia();
    $res->setReseniaId(htmlentities($_REQUEST['id']));
    $exito = $this->model->delete($res);
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if ($exito) {
      $_SESSION['mensaje'] = "Reseña eliminada exitosamente!";
      $_SESSION['color'] = "azul";
    }else{
      $_SESSION['mensaje'] = "ERROR: No se pudo eliminar la reseña. Intentalo de nuevo.";
      $_SESSION['color'] = "rojo";
    }

    header('Location:index.php?c=Resenias&f=view_list');    
  }
}
