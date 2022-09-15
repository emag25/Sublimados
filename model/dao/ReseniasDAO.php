<?php  // AUTOR: APRAEZ GONZALEZ EMELY MISHELL

require_once 'config/Conexion.php';

class ReseniasDAO {

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectByState() {      
        $sql = "SELECT * FROM resenia WHERE estado = :state";
        $stmt = $this->con->prepare($sql);
        $data = ['state' => '1'];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
    }



    /*--  CONSULTAR RESEÑA  --*/

    public function selectAll() {      
        $sql = "SELECT * FROM resenia, usuario WHERE usuario_id = id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM resenia, usuario WHERE (nombre like :name AND usuario_id = id_usuario)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $name . '%';
        $data = array('name' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
    }




    /*--  INSERTAR RESEÑA  --*/

    public function insert($res) {
        try{
            $sql = "INSERT INTO resenia (nombre, email, valoracion, servicio, resenia, recibir_promo, usuario_id) VALUES 
            (:nombre, :email,:valoracion, :servicio, :nuevaResenia, :recibiremail, :usuario_id)";
        
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' =>  $res->getNombre(),
                'email' =>  $res->getEmail(),
                'valoracion' =>  $res->getValoracion(),
                'servicio' =>  $res->getServicio(),
                'nuevaResenia' =>  $res->getResenia(),
                'recibiremail' =>  $res->getRecibirPromo(),
                'usuario_id' =>  $res->getUsuarioId()
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




    /*--  EDITAR RESEÑA  --*/

    public function selectById($id){
        $sql = "SELECT * FROM resenia WHERE resenia_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultado;
    }

    public function update($res){
        try{
            $sql = "UPDATE resenia SET nombre = :nombre, email = :email, valoracion = :valoracion, servicio = :servicio, 
                                       resenia = :nuevaResenia, recibir_promo = :recibiremail, estado = :estado WHERE resenia_id=:id";

            $sentencia = $this->con->prepare($sql);
            $data = [            
                'nombre' =>  $res->getNombre(),
                'email' =>  $res->getEmail(),
                'valoracion' =>  $res->getValoracion(),
                'servicio' =>  $res->getServicio(),
                'nuevaResenia' =>  $res->getResenia(),
                'recibiremail' =>  $res->getRecibirPromo(),
                'estado' =>  $res->getEstado(),
                'id' =>  $res->getReseniaId()
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




    /*--  ELIMINAR RESEÑA  --*/

    public function delete($res){
        try{  
            // Para que NO permita eliminar una reseña publicada (estado = 1)
            $resultado = $this->selectById($res->getReseniaId());           
            
            if ($resultado->estado == "0"){
                          
                $sql = "DELETE FROM resenia WHERE resenia_id = :id";
                $sentencia = $this->con->prepare($sql); 
                $data = ['id' =>  $res->getReseniaId()];
                $sentencia->execute($data);
    
                if ($sentencia->rowCount() <= 0) {
                    return false;
                }      

            }else{                                  
                if(!isset($_SESSION)){ 
                    session_start();
                }
                $_SESSION['mensaje'] = "ERROR: No puede eliminar una reseña publicada.";
                $_SESSION['color'] = "rojo";
                return false;
            }
            
        }catch(Exception $e){
            return false;
        }
        return true;
    }    
}
