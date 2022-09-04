<?php

require_once 'model/dao/ReseniasDAO.php';
require_once 'model/dto/Resenia.php';

class ReseniasController {

  private $model;
  
  public function __construct() {
    $this->model = new ReseniasDAO();
  }

  public function index() {      
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
      $resultados = $this->model->selectAll();
    }else{
      $resultados = $this->model->selectByName($name);
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
      //$res->setReseniaId(htmlentities($_POST['id']));
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
      
      header('Location:index.php?c=Resenias&f=view_list');
         
    } 
  }





  /*--  ELIMINAR RESEÑA  --*/

  public function delete(){
    
    $id= $_REQUEST['id'];
    $res = new Resenia();
    $res->setReseniaId(htmlentities($_REQUEST['id']));
    $exito = $this->model->delete($res);
    if ($exito) {
      header('Location:index.php?c=Resenias&f=view_list');
    }    
  }
}
