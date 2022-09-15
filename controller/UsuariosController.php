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
      
      if(!isset($_SESSION)){
        session_start();
      }
      
      if (!empty($_POST['nombre']) && !empty($_POST['contrasenia']) && !empty($_POST['radio'])) {

        // validar que el usuario no exista
        $encontrado = $this->model->selectByName(htmlentities($_POST['nombre']));           
        
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

      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo registrar al usuario. Intentalo de nuevo.";
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if(!isset($_SESSION)){ 
        session_start();
      }

      if (!empty($_POST['nombre']) && !empty($_POST['contrasenia'])) {

        $resultado = $this->model->selectByNamePass(htmlentities($_POST['nombre']), htmlentities($_POST['contrasenia'])); 
      
        if($resultado != -1){

          if($resultado->activo == '1'){
            $_SESSION['rol'] = $resultado->rol;
            $_SESSION['id'] = $resultado->id_usuario;
            $_SESSION['nombre'] = $resultado->usuario;
            header('Location:index.php?c=inicio&f=index');
          
          }else{
            $_SESSION['mensaje'] = "ERROR: Su cuenta ha sido desactivada.";
            $_SESSION['color'] = "rojo";
            header('Location:index.php?c=Usuarios&f=view_login');
          }
          
        }else{
          $_SESSION['mensaje'] = "ERROR: Usuario o contraseña incorrecta.";
          $_SESSION['color'] = "rojo";
          header('Location:index.php?c=Usuarios&f=view_login');
        }
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudieron obtener los datos. Intenta de nuevo";
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
    $name = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";

    if (empty($name)) {            
      $resultados = $this->model->selectAll();
      array_push($resultados, (object) array('mensaje_error'=>'ERROR: Debe ingresar un nombre.'));     
    
    }else{
      $resultados = $this->model->selectByLike($name);
      
      if (count($resultados)==0) {
        $resultados = $this->model->selectAll();
        array_push($resultados, (object) array('mensaje_error'=>'ERROR: Nombre no encontrado.'));     
      }          
    }
    echo json_encode($resultados);  
  }







  /* ---------------- EDITAR ----------------  */

  public function view_edit() {   
    $id = $_REQUEST['id'];   
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if($id != $_SESSION['id']){
      $usu = $this->model->selectById($id);    
      require_once VUSUARIOS.'edit.php';
    
    }else{
      $_SESSION['mensaje'] = "ERROR: No puede editar su propio usuario";
      $_SESSION['color'] = "rojo";
      header('Location:index.php?c=Usuarios&f=view_list');
    }     
  }

  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!empty($_POST['id']) && !empty($_POST['radio'])) {
        
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
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if($_REQUEST['id'] != $_SESSION['id']){
      
      $usu = new Usuario();
      $usu->setUsuarioId(htmlentities($_REQUEST['id']));
      $usu->setActivo(0);
      $exito = $this->model->delete($usu);     

      if ($exito) {
        $_SESSION['mensaje'] = "Usuario eliminado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo eliminar el usuario. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";       
      }

    }else{
      $_SESSION['mensaje'] = "ERROR: No puede eliminar su propio usuario";
      $_SESSION['color'] = "rojo";
    } 

    header('Location:index.php?c=Usuarios&f=view_list');    
  }
}
