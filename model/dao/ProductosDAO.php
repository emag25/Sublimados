<?php // AUTOR:SICHA VEGA BETSY ARLETTE
require_once 'config/Conexion.php';

class ProductosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    // CONSULTAR DISEÑO DE PRODUCTO
    public function selectAll() {      
        $sql = "SELECT * FROM disenio_producto, usuario WHERE usuario_id = id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM disenio_producto, usuario WHERE (cliente like :name AND usuario_id = id_usuario)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $name . '%';
        $data = array('name' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
    }

    // INSERTAR DISEÑO DE PRODUCTO
    public function insert($prod){
        try{
        $sql = "INSERT INTO disenio_producto (producto, cliente, telefono, colores, disenio, modelo, observaciones, usuario_id) VALUES 
        (:producto, :cliente, :telefono, :colores, :disenio, :modelo, :observaciones, :usuario_id)";

        $sentencia = $this->con->prepare($sql);
        $data = [
        'producto' =>  $prod->getProducto(),
        'cliente' =>  $prod->getCliente(),
        'telefono' => $prod->getTelefono(),
        'colores' => $prod->getColores(),
        'disenio' =>  $prod->getDisenio(),
        'modelo' =>  $prod->getModelo(),
        'observaciones' => $prod->getObservaciones(),
        'usuario_id' => $prod->getUsuarioId()
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

            echo $prod->getDisenioId();
            echo $prod->getProducto();
            echo $prod->getCliente();
            echo $prod->getTelefono();
            echo $prod->getColores();
            echo $prod->getDisenio();
            echo $prod->getModelo();
            echo $prod->getObservaciones();

            $sql = "UPDATE disenio_producto SET  disenio_id = :id, producto = :producto, cliente =:cliente, telefono =:telefono, colores =:colores,
                    disenio = :disenio, modelo = :modelo, observaciones =:observaciones WHERE disenio_id = :id";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $prod->getDisenioId(),
                'producto' =>  $prod->getProducto(),
                'cliente' =>  $prod->getCliente(),
                'telefono' => $prod->getTelefono(),
                'colores' => $prod->getColores(),
                'disenio' =>  $prod->getDisenio(),
                'modelo' =>  $prod->getModelo(),
                'observaciones' => $prod->getObservaciones()
                ];

            $sentencia->execute($data);

            if ($sentencia->rowCount() <= 0) {
                return false;
            }else{
                return true;
            }
        }catch(Exception $e){
            return false;
            echo $e;
        }
                   
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
