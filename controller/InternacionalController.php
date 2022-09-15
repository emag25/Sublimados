<!--  AUTOR  YANEZ GUILLEN PAULA ADRIANA  -->

<?php
require_once 'model/dao/InternacionalDAO.php';
require_once 'model/dto/Internacional.php';


class InternacionalController {

  private $model2;
  
  public function __construct() { 
      $this->model2 = new InternacionalDAO();
  }

  public function index() {  
    require_once VSERVICIOS.'servicios.principal.php';
  }


  /* -------------------------------------------- INTERNACIONAL  ------------------------------------------ */
  
  //    INSERTAR

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
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Envío guardado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar el envío. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }

      if(($_SESSION['rol']=="cliente") or ($_SESSION['rol']=="marketing")){
        header('Location:index.php?c=Inicio&f=index');
      }else{
        header('Location:index.php?c=Servicios&f=view_internacional_list');
      }
      
    }
  }
  

  //   CONSULTAR

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


  //    EDITAR

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
        $_SESSION['mensaje'] = "Envío editado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo editado el envío. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }

      header('Location:index.php?c=Servicios&f=view_internacional_list');
    } 
  }


  //     ELIMINAR

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


