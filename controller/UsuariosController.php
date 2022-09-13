<?php

require_once 'model/dao/UsuariosDAO.php';
require_once 'model/dto/Usuario.php';

class UsuariosController {

  private $model;
  
  public function __construct() {
    $this->model = new UsuariosDAO();
  }

  public function index() { 
    try{
      unset($_SESSION['rol']);      
    }catch(Exception $e){   }       

    require_once VUSUARIOS.'login.php';
  }




  /* ---------------- REGISTRARSE / INSERTAR ----------------  */

  public function view_new() { 
    require_once VUSUARIOS.'new.php';
  }

  public function new() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      $usu = new Usuario();
      
      $usu->setNombre(htmlentities($_POST['nombre']));
      $usu->setContrasenia(htmlentities($_POST['contrasenia']));

      
      if (htmlentities($_POST['radio']) == "Cliente") {
        $rol = $this->model->selectByRol("Cliente");     
      
      }else if (htmlentities($_POST['radio']) == "Administrador"){
        $rol = $this->model->selectByRol("Administrador");  
      
      }else if (htmlentities($_POST['radio']) == "Marketing"){
        $rol = $this->model->selectByRol("Marketing");   
      }

      if($rol != -1){
        $usu->setRol($rol);
        $exito = $this->model->insert($usu);
      }else{
        $exito = false;
      }
                        
      if(!isset($_SESSION)){ 
        session_start();
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Usuario guardado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar el usuario. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
      
      header('Location:index.php?c=Usuarios&f=view_login');
            
    }
  }






  /* ---------------- INICIAR SESION ----------------  */

  public function view_login() { 
    require_once VUSUARIOS.'login.php';
  }
  
  public function iniciar() { 
    // aqui validamos correo y contrase;a correcto
    if(!isset($_SESSION)){ 
      session_start();
    }
    $_SESSION['rol'] = "cliente"; 

    header('Location:index.php?c=inicio&f=index');
  }  






  /* ---------------- CONSULTAR ----------------  */

  public function view_list() {   
    $resultados = $this->model->selectAll();   
    require_once VUSUARIOS.'list.php';
  }

  public function search() {
    $name = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";

    if (empty($name)) {
      
      if(!isset($_SESSION)){ 
        session_start();
      }
      $_SESSION['mensaje'] = "ERROR: Debe ingresar un nombre de usuario.";
      $_SESSION['color'] = "rojo";
      
      $resultados = $this->model->selectAll();
    
    }else{
      $resultados = $this->model->selectByName($name);
      if (count($resultados)==0) {
        if(!isset($_SESSION)){ 
          session_start();
        }
        $_SESSION['mensaje'] = "ERROR: Nombre usuario no encontrado.";
        $_SESSION['color'] = "rojo";
        $resultados = $this->model->selectAll();
      }
    }
    
    require_once VUSUARIOS.'list.php';  
  }









  /* ---------------- EDITAR ----------------  */

  public function view_edit() {   
    $id = $_REQUEST['id'];     
    $usu = $this->model->selectById($id);
    
    require_once VRESENIAS.'edit.php';
  }

  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      $usu = new Usuario();
      
      $usu->setNombre(htmlentities($_POST['nombre']));
      $usu->setContrasenia(htmlentities($_POST['contrasenia']));

      
      if (htmlentities($_POST['radio']) == "Cliente") {
        $rol = $this->model->selectByRol("Cliente");     
      
      }else if (htmlentities($_POST['radio']) == "Administrador"){
        $rol = $this->model->selectByRol("Administrador");  
      
      }else if (htmlentities($_POST['radio']) == "Marketing"){
        $rol = $this->model->selectByRol("Marketing");   
      }

      if($rol != -1){
        $usu->setRol($rol);
        $exito = $this->model->update($usu);
      }else{
        $exito = false;
      }
                        
      if(!isset($_SESSION)){ 
        session_start();
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Usuario editado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo editado el usuario. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
      
      header('Location:index.php?c=Usuarios&f=view_list');
            
    }
  }






  /* ---------------- ELIMINAR ----------------  */

  public function delete(){
    
    $id= $_REQUEST['id'];
    $usu = new Usuario();
    $usu->setUsuarioId(htmlentities($_REQUEST['id']));
    $exito = $this->model->delete($usu);
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if ($exito) {
      $_SESSION['mensaje'] = "Usuario eliminado exitosamente!";
      $_SESSION['color'] = "azul";
    }else{
      if ( (!isset($_SESSION['mensaje'])) and (!isset($_SESSION['color'])) ){
        $_SESSION['mensaje'] = "ERROR: No se pudo eliminar el usuario. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
    }

    header('Location:index.php?c=Usuarios&f=view_list');    
  }
}
