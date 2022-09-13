<!--AUTOR:SICHA VEGA BETSY ARLETTE-->
<?php
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dto/Producto.php';

class ProductosController {

  private $model;
  
  public function __construct() {    
    $this->model = new ProductosDAO();
  }

  // FUNCION INDEX
  public function index() {  
    require_once VPRODUCTOS.'principal.php';
  } 

  // FUNCION INSERTAR NUEVO DISEÑO DE PRODUCTO
  public function view_new() {     
    require_once VPRODUCTOS.'new.php';
  }

  public function new() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $prod = new Producto();
      
      if (htmlentities($_POST['producto']) == '1') {
        $prod->setProducto("camiseta");
      }else if (htmlentities($_POST['producto']) == '2'){
        $prod->setProducto("abrigo");
      }else if (htmlentities($_POST['producto']) == '3'){
        $prod->setProducto("gorra");
      }else if (htmlentities($_POST['producto']) == '4'){
        $prod->setProducto("taza");
      }else if (htmlentities($_POST['producto']) == '5'){
        $prod->setProducto("bolso");
      }

      
      $prod->setCliente(htmlentities($_POST['cliente']));
      $prod->setTelefono(htmlentities($_POST['telefono']));
      $colores="";
      foreach($_POST['colores'] as $color){
        if(htmlentities($color)=="1"){
          $colores.="amarillo"." ";
        }else if(htmlentities($color)=="2"){
          $colores.="azul"." ";
        }else if(htmlentities($color)=="3"){
          $colores.="rojo"." ";
        }else if(htmlentities($color)=="4"){
          $colores.="verde"." ";
        }else if(htmlentities($color)=="5"){
          $colores.="morado"." ";
        }else if(htmlentities($color)=="6"){
          $colores.="naranja"." ";
        }else if(htmlentities($color)=="7"){
          $colores.="blanco"." ";
        }else if(htmlentities($color)=="8"){
          $colores.="negro"." ";
        }else if(htmlentities($color)=="9"){
          $colores.="gris"." ";
        }
        
      }
      $prod->setColores($colores);



      if (htmlentities($_POST['disenio']) == '1') {
        $prod->setDisenio("personalizado");
      }else if (htmlentities($_POST['disenio']) == '2'){
        $prod->setDisenio("estándar");
      }else if (htmlentities($_POST['disenio']) == '3'){
        $prod->setDisenio("sorpresa");
      }

      

      if (htmlentities($_POST['modelo']) == 'real') {
        $prod->setModelo("Realista");
      }else if (htmlentities($_POST['modelo']) == 'cari'){
        $prod->setModelo("Caricatura");
      }else if (htmlentities($_POST['modelo']) == 'an'){
        $prod->setModelo("Anime");
      }
      
      $prod->setObservaciones(htmlentities($_POST['observaciones']));
      

      $exito = $this->model->insert($prod);

      if(!isset($_SESSION)){ 
        session_start();
      }

      if ($exito) {
        $_SESSION['mensaje'] = "Producto guardado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo guardar el producto. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }      
    
      if(($_SESSION['rol']=="cliente") or ($_SESSION['rol']=="marketing")){
        header('Location:index.php?c=Inicio&f=index');
      }else{
        header('Location:index.php?c=Productos&f=view_list');
      }
      
    } 
  }

  // FUNCION CONSULTAR DISEÑO DE PRODUCTO
  public function view_list() {  
    $resultados = $this->model->selectAll();
    require_once VPRODUCTOS.'list.php';
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
        $_SESSION['mensaje'] = "ERROR: Nombre no encontrado.";
        $_SESSION['color'] = "rojo";
        $resultados = $this->model->selectAll();
      }
    }      
    require_once VPRODUCTOS.'list.php';  
  }

  // FUNCIÓN ELIMINAR DISEÑO DE PRODUCTO
  public function delete(){

    $id= $_REQUEST['id'];

    $prod = new Producto();
    $prod->setDisenioId(htmlentities($_REQUEST['id']));
                
    $exito = $this->model->delete($prod);
    
    if(!isset($_SESSION)){ 
      session_start();
    }

    if ($exito) {
      $_SESSION['mensaje'] = "Producto eliminado exitosamente!";
      $_SESSION['color'] = "azul";
    }else{
      $_SESSION['mensaje'] = "ERROR: No se pudo eliminar el producto. Intentalo de nuevo.";
      $_SESSION['color'] = "rojo";
    }

    header('Location:index.php?c=Productos&f=view_list');
  }

  // FUNCIÓN EDITAR DISEÑO DE PRODUCTO
  public function view_edit() {   
    $id= $_REQUEST['id']; 
    $prod = $this->model->selectById($id);
    require_once VPRODUCTOS.'edit.php';
  }

  public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $prod = new Producto();

      $prod->setDisenioId(htmlentities($_POST['id']));

      if (htmlentities($_POST['producto']) == '1') {
        $prod->setProducto("camiseta");
      }else if (htmlentities($_POST['producto']) == '2'){
        $prod->setProducto("abrigo");
      }else if (htmlentities($_POST['producto']) == '3'){
        $prod->setProducto("gorra");
      }else if (htmlentities($_POST['producto']) == '4'){
        $prod->setProducto("taza");
      }else if (htmlentities($_POST['producto']) == '5'){
        $prod->setProducto("bolso");
      }

      $prod->setCliente(htmlentities($_POST['cliente']));
      $prod->setTelefono(htmlentities($_POST['telefono']));

      $colores="";
      foreach($_POST['colores'] as $color){
        if(htmlentities($color)=="1"){
          $colores.="amarillo"." ";
        }else if(htmlentities($color)=="2"){
          $colores.="azul"." ";
        }else if(htmlentities($color)=="3"){
          $colores.="rojo"." ";
        }else if(htmlentities($color)=="4"){
          $colores.="verde"." ";
        }else if(htmlentities($color)=="5"){
          $colores.="morado"." ";
        }else if(htmlentities($color)=="6"){
          $colores.="naranja"." ";
        }else if(htmlentities($color)=="7"){
          $colores.="blanco"." ";
        }else if(htmlentities($color)=="8"){
          $colores.="negro"." ";
        }else if(htmlentities($color)=="9"){
          $colores.="gris"." ";
        }
        
      }
      $prod->setColores($colores);

      
      if (htmlentities($_POST['disenio']) == '1') {
        $prod->setDisenio("personalizado");
      }else if (htmlentities($_POST['disenio']) == '2'){
        $prod->setDisenio("estándar");
      }else if (htmlentities($_POST['disenio']) == '3'){
        $prod->setDisenio("sorpresa");
      }

      if (htmlentities($_POST['modelo']) == 'real') {
        $prod->setModelo("Realista");
      }else if (htmlentities($_POST['modelo']) == 'cari'){
        $prod->setModelo("Caricatura");
      }else if (htmlentities($_POST['modelo']) == 'an'){
        $prod->setModelo("Anime");
      }
      
      $prod->setObservaciones(htmlentities($_POST['observaciones']));

      
      $exito = $this->model->update($prod);
      
      if(!isset($_SESSION)){ 
        session_start();
      }
  
      if ($exito) {
        $_SESSION['mensaje'] = "Producto editado exitosamente!";
        $_SESSION['color'] = "azul";
      }else{
        $_SESSION['mensaje'] = "ERROR: No se pudo editar el producto. Intentalo de nuevo.";
        $_SESSION['color'] = "rojo";
      }
      
      header('Location:index.php?c=Productos&f=view_list');           
    } 
  }
}
