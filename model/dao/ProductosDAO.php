<?php
require_once 'config/Conexion.php';

class ProductosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    // CONSULTAR DISEÑO DE PRODUCTO
    public function selectAll() {      
        $sql = "SELECT * FROM disenio_producto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM disenio_producto WHERE cliente = :name";
        $stmt = $this->con->prepare($sql);
        $data = ['name' => $name];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
    }

    // INSERTAR DISEÑO DE PRODUCTO
    public function insert($prod){
        try{
        $sql = "INSERT INTO disenio_producto (producto, cliente, disenio, modelo) VALUES 
        (:producto, :cliente, :disenio, :modelo)";

        $sentencia = $this->con->prepare($sql);
        $data = [
        'producto' =>  $prod->getProducto(),
        'cliente' =>  $prod->getCliente(),
        'disenio' =>  $prod->getDisenio(),
        'modelo' =>  $prod->getModelo()
        ];
  
        $sentencia->execute($data);

        if ($sentencia->rowCount() <= 0) {
           return false;
        }

    }catch(Exception $e){
        return false;
    }

        return true;
    }

    // EDITAR DISEÑO DE PRODUCTO
    
    public function selectById($id){
        $sql = "SELECT * FROM disenio_producto WHERE disenio_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultado;
    }
    public function update($prod){

        try{

            $sql = "UPDATE disenio_producto SET  producto = :producto, cliente =:cliente,
                    disenio = :disenio, modelo = :modelo WHERE disenio_id = :id";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $prod->getDisenioId(),
                'producto' =>  $prod->getProducto(),
                'cliente' =>  $prod->getCliente(),
                'disenio' =>  $prod->getDisenio(),
                'modelo' =>  $prod->getModelo()
                ];

            $sentencia->execute($data);

            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        }catch(Exception $e){
            return false;
        }
            return true;       
    }

    //ELIMINAR DISEÑO DE PRODUCTO
    public function delete($prod){
        try{        
            $sql = "DELETE FROM disenio_producto WHERE disenio_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = [
                'id' =>  $prod->getDisenioId(),                
            ];
            $sentencia->execute($data);
   
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }
}
