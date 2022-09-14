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

      // validar que el usuario no exista
      $encontrado = $this->model->selectByName(htmlentities($_POST['nombre']));
      
      if(!isset($_SESSION)){
        session_start();
      }
      
      if($encontrado){

        $_SESSION['mensaje'] = "ERROR: Usuario ya registrado. Inicia sesion!";
        $_SESSION['color'] = "rojo";

      }else{

        $usu = new Usuario();
      
        $usu->setNombre(htmlentities($_POST['nombre']));
        $usu->setContrasenia(htmlentities($_POST['contrasenia'])); 

        if (htmlentities($_POST['radio']) == "Cliente") {
          $rol = $this->model->selectByRol("cliente");
        
        }else if (htmlentities($_POST['radio']) == "Administrador"){
          $rol = $this->model->selectByRol("administrador");
        
        }else if (htmlentities($_POST['radio']) == "Marketing"){
          $rol = $this->model->selectByRol("marketing");
        }

        if($rol != -1){
          $usu->setRol($rol);
          $exito = $this->model->insert($usu);
        }else{
          $exito = false;
        }

        if ($exito) {
          $_SESSION['mensaje'] = "Usuario registrado exitosamente. Ya puedes inicar sesión!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo registrar al usuario. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
      } 
      header('Location:index.php?c=Usuarios&f=view_login');            
    }
  }






  /* ---------------- INICIAR SESION ----------------  */

  public function view_login() { 
    require_once VUSUARIOS.'login.php';
  }
  
  public function iniciar() { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $resultados = $this->model->selectByNamePass(htmlentities($_POST['nombre']), htmlentities($_POST['contrasenia'])); 
     
      if(!isset($_SESSION)){ 
        session_start();
      }

      if($resultados != -1){
        
        $_SESSION['rol'] = $resultados->rol;
        $_SESSION['id'] = $resultados->id_usuario;
        $_SESSION['nombre'] = $resultados->usuario;
        header('Location:index.php?c=inicio&f=index');
      
      }else{
        $_SESSION['mensaje'] = "ERROR: Usuario o contraseña incorrecta.";
        $_SESSION['color'] = "rojo";
        header('Location:index.php?c=Usuarios&f=view_login');
      }
    }
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
      $resultados = $this->model->selectByLike($name);
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

  public function view_edit_rol() {   
    $id = $_REQUEST['id'];     
    $usu = $this->model->selectById($id);
    
    require_once VUSUARIOS.'edit.php';
  }

  public function edit_Rol(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      $usu = new Usuario();
      
      $usu->setUsuarioId(htmlentities($_POST['id']));
      
      if (htmlentities($_POST['radio']) == "Cliente") {
        $rol = $this->model->selectByRol("cliente");
      
      }else if (htmlentities($_POST['radio']) == "Administrador"){
        $rol = $this->model->selectByRol("administrador");
      
      }else if (htmlentities($_POST['radio']) == "Marketing"){
        $rol = $this->model->selectByRol("marketing");
      }

      if($rol != -1){
        $usu->setRol($rol);
        $exito = $this->model->updateRol($usu);
      }else{
        $exito = false;
      }

      if(!isset($_SESSION)){ 
        session_start();
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Usuario editado exitosamente.";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo editar el usuario. Intentalo de nuevo.";
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
