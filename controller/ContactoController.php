<!--  AUTOR: QUITO YAMBAY RUTH MARIA  -->

<?php
require_once 'model/dao/ContactoDAO.php';
require_once 'model/dto/Contacto.php';

class ContactoController {

    private $model;
    
    public function __construct() {
      $this->model = new ContactoDAO();
        }

    public function index() {    
      require_once VCONTACTO.'principal.php';
    }   
    
    /* CONSULTAR */
    public function view_list() {
      $result = $this->model->selectAll();
      require_once VCONTACTO.'list.php';
    }

    public function search() {
      $name = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";

    if (empty($name)) {
      
      if(!isset($_SESSION)){ 
        session_start();
      }
      $_SESSION['mensaje'] = "ERROR: Debe ingresar un nombre.";
      $_SESSION['color'] = "rojo";
      
      $result = $this->model->selectAll();
    
    }else{
      $result = $this->model->selectByName($name);
      if (count($result)==0) {
        if(!isset($_SESSION)){ 
          session_start();
        }
        $_SESSION['mensaje'] = "ERROR: Nombre de autor de la reseña no encontrado.";
        $_SESSION['color'] = "rojo";
        $result = $this->model->selectAll();
      }
    }       
      require_once VCONTACTO.'list.php';  
    }
    
    
    
    /* INSERTAR */
    
    public function view_new() {    
      $modeloContacto = new ContactoDAO();     
      require_once VCONTACTO.'new.php';
    }
    
    public function new() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
        $cont = new Contacto();
        
        $cont->setNombre(htmlentities($_POST['nombre']));
        $cont->setApellido(htmlentities($_POST['apellido']));
        $cont->setCelular(htmlentities($_POST['celular']));
        $cont->setEmail(htmlentities($_POST['email']));     
        /* validación de genero */
        if (htmlentities($_POST['radio']) == 1) {
          $cont->setGenero("Femenino");
        }else if (htmlentities($_POST['radio']) == 2){
          $cont->setGenero("Masculino");
        }else if (htmlentities($_POST['radio']) == 3){
          $cont->setGenero("Otro");
        }
                
      /*   $cont->setEstadoCivil(htmlentities($_POST['estado'])); */
        if (htmlentities($_POST['estado']) == 1) {
          $cont->setEstadoCivil("Soltero");
        }else if (htmlentities($_POST['estado']) == 2){
          $cont->setEstadoCivil("Casado");
        }else if (htmlentities($_POST['estado']) == 3){
          $cont->setEstadoCivil("Viudo");
        }else if (htmlentities($_POST['estado']) == 4){
          $cont->setEstadoCivil("Otro");
        } 
        
        /* valoración intereses */
        if (isset($_POST['intereses'])) {
          $cont->setIntereses(1);
        }else{
          $cont->setIntereses(0);
        }

        $cont->setFechaNacimiento(htmlentities($_POST['fecha']));
        $cont->setComentario(($_POST['comentario']));
        
              
        $exito = $this->model->insert($cont);
              
        if(!isset($_SESSION)){ 
          session_start();
        };
  
        if ($exito) {
          $_SESSION['mensaje'] = "Contacto guardado exitosamente!";
          $_SESSION['color'] = "azul";
        }else{
          $_SESSION['mensaje'] = "ERROR: No se pudo guardar el contacto. Intentalo de nuevo.";
          $_SESSION['color'] = "rojo";
        }
  
        header('Location:index.php?c=Contacto&f=view_list');
      }
    }


    /*    EDITAR   */
    public function view_edit() { 
      $id = $_REQUEST['id'];     
      $cont = $this->model->selectById($id);

      require_once VCONTACTO.'edit.php';
    }

    public function edit(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
        $cont = new Contacto();
  
        $cont->setContactoId(htmlentities($_POST['id']));
        $cont->setNombre(htmlentities($_POST['nombre']));
        $cont->setApellido(htmlentities($_POST['apellido']));
        $cont->setCelular(htmlentities($_POST['celular']));
        $cont->setEmail(htmlentities($_POST['email']));     
        
        /* validación de genero */
        if (htmlentities($_POST['radio']) == 1) {
          $cont->setGenero("Femenino");
        }else if (htmlentities($_POST['radio']) == 2){
          $cont->setGenero("Masculino");
        }else if (htmlentities($_POST['radio']) == 3){
          $cont->setGenero("Otro");
        }
                
      /*   validación de estado civil */
        if (htmlentities($_POST['estado']) == 1) {
          $cont->setEstadoCivil("Soltero");
        }else if (htmlentities($_POST['estado']) == 2){
          $cont->setEstadoCivil("Casado");
        }else if (htmlentities($_POST['estado']) == 3){
          $cont->setEstadoCivil("Viudo");
        }
        
        /* valoración intereses */
        
        if (isset($_POST['intereses'])) {
          $cont->setIntereses(1);
        }else{
          $cont->setIntereses(0);
        } 

        $cont->setFechaNacimiento(htmlentities($_POST['fecha']));
        $cont->setComentario(($_POST['comentario']));
        
              
      $exito = $this->model->update($cont);
      if(!isset($_SESSION)){ 
        session_start();
      };

      if ($exito) {
        $_SESSION['mensaje'] = "Contacto modificado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar los cambios. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
  
        header('Location:index.php?c=Contacto&f=view_list');
      } 
    }




    /*         ELIMINAR                */

    public function delete(){
    
      $id= $_REQUEST['id'];
      $cont = new Contacto();
      $cont->setContactoId(htmlentities($_REQUEST['id']));
      $exito = $this->model->delete($cont);
      
      if(!isset($_SESSION)){ 
        session_start();
      };
  
      if ($exito) {
        $_SESSION['mensaje'] = "Contacto eliminado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo eliminar la reseña. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
  
      header('Location:index.php?c=Contacto&f=view_list');    
    }




}
