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
      $resultados = $this->model->selectAll("");     
      require_once VPRODUCTOS.'principal.php';
    } 
    // FUNCION INSERTAR NUEVO DISEÑO DE PRODUCTO
    public function view_new() {     
      $modeloProd = new ProductosDAO();
      require_once VPRODUCTOS.'new.php';
    }

    public function new() {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $prod = new Producto();
          
          $prod->setProducto(htmlentities($_POST['producto']));
          $prod->setCliente(htmlentities($_POST['cliente']));
          $prod->setDisenio(htmlentities($_POST['disenio']));

          if (htmlentities($_POST['modelo']) == 'real') {
            $prod->setModelo("Realista");
          }else if (htmlentities($_POST['radio']) == 'cari'){
            $prod->setModelo("Caricatura");
          }else if (htmlentities($_POST['radio']) == 'an'){
            $prod->setModelo("Anime");
          }
          
        
          $exito = $this->model->insert($prod);

          $msj = 'Producto guardado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar el guardado";
              $color = "danger";
          }
          if (!isset($_SESSION)) {
              session_start();
          };
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;

          header('Location:index.php?c=Productos&f=view_list');
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
         $msj = 'Producto eliminado exitosamente';
             $color = 'primary';
             if (!$exito) {
                 $msj = "No se pudo eliminar la actualizacion";
                 $color = "danger";
             }
              if(!isset($_SESSION)){ session_start();};
             $_SESSION['mensaje'] = $msj;
             $_SESSION['color'] = $color;

           header('Location:index.php?c=productos&f=view_list');
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
            $prod->setProducto(htmlentities($_POST['producto']));
            $prod->setCliente(htmlentities($_POST['cliente']));
            $prod->setDisenio(htmlentities($_POST['disenio']));

            if (htmlentities($_POST['modelo']) == 'real') {
              $prod->setModelo("Realista");
            }else if (htmlentities($_POST['radio']) == 'cari'){
              $prod->setModelo("Caricatura");
            }else if (htmlentities($_POST['radio']) == 'an'){
              $prod->setModelo("Anime");
            }
        

            $exito = $this->model->update($prod);
            $msj = 'Producto actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
             if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;

            header('Location:index.php?c=productos&f=view_list');
           
        } 
     }
}
