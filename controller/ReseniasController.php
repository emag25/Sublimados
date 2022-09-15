<?php  // AUTOR: APRAEZ GONZALEZ EMELY MISHELL

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
    $name = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";

    if (empty($name)) {            
      $resultados = $this->model->selectAll();
      array_push($resultados, (object) array('mensaje_error'=>'ERROR: Debe ingresar un nombre.'));     
    
    }else{
      $resultados = $this->model->selectByName($name);
      
      if (count($resultados)==0) {
        $resultados = $this->model->selectAll();
        array_push($resultados, (object) array('mensaje_error'=>'ERROR: Nombre de autor de la reseña no encontrado.'));     
      }          
    }
    echo json_encode($resultados);
  }




  /*--  INSERTAR RESEÑA  --*/

  public function view_new() {  
    $modeloResenia = new ReseniasDAO();    
    require_once VRESENIAS.'new.php';
  }

  public function new() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if(!isset($_SESSION)){ 
        session_start();
      }
      
      if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['valoracion']) && 
      !empty($_POST['radio']) && !empty($_POST['nuevaResenia'])) {
        
        $res = new Resenia();
        
        $res->setUsuarioId($_SESSION['id']);
        $res->setNombre(htmlentities($_POST['nombre']));
        $res->setEmail(htmlentities($_POST['email']));
        $res->setValoracion(htmlentities($_POST['valoracion']));
        $res->setResenia(htmlentities($_POST['nuevaResenia']));      
        
        if (htmlentities($_POST['radio']) == 1) {
          $res->setServicio("A domicilio");
        }else if (htmlentities($_POST['radio']) == 2){
          $res->setServicio("Internacional");
        }        
        
        if (isset($_POST['recibiremail'])) {
          $res->setRecibirPromo(1);
        }else{
          $res->setRecibirPromo(0);
        }        

        $exito = $this->model->insert($res);

      }else{
        $exito = false;
      } 

      if ($exito) {
        $_SESSION['mensaje'] = "Reseña guardada exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar la reseña. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }

      if(($_SESSION['rol']=="cliente") or ($_SESSION['rol']=="marketing")){
        header('Location:index.php?c=Inicio&f=index');
      }else{
        header('Location:index.php?c=Resenias&f=view_list');
      }     
    }
  }
  



  /*--  EDITAR RESEÑA  --*/

  public function view_edit() {   
    $id = $_REQUEST['id'];     
    $res = $this->model->selectById($id);

    require_once VRESENIAS.'edit.php';
    header('Location:index.php?c=Resenias&f=view_list');
      
  }

  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['valoracion']) && 
      !empty($_POST['radio']) && !empty($_POST['nuevaResenia'])) {
 
        $res = new Resenia();

        $res->setReseniaId(htmlentities($_POST['id']));
        $res->setNombre(htmlentities($_POST['nombre']));
        $res->setEmail(htmlentities($_POST['email']));
        $res->setValoracion(htmlentities($_POST['valoracion']));      
        $res->setEstado(htmlentities($_POST['radius']));        
        $res->setResenia(htmlentities($_POST['nuevaResenia']));
        
        if (htmlentities($_POST['radio']) == 1) {
          $res->setServicio("A domicilio");
        }else if (htmlentities($_POST['radio']) == 2){
          $res->setServicio("Internacional");
        }
        
        if (isset($_POST['recibiremail'])) {
          $res->setRecibirPromo(1);
        }else{
          $res->setRecibirPromo(0);
        }
        
        $exito = $this->model->update($res);        
      
      }else{
        $exito = false;
      }

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
      if ( (!isset($_SESSION['mensaje'])) and (!isset($_SESSION['color'])) ){
        $_SESSION['mensaje'] = "ERROR: No se pudo eliminar la reseña. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
    }

    header('Location:index.php?c=Resenias&f=view_list');    
  }
}
