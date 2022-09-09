<!--  AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->

<?php

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
        $sql = "SELECT * FROM resenia";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM resenia WHERE (nombre like :name)";
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
            $sql = "INSERT INTO resenia (nombre, email, valoracion, servicio, resenia, recibir_promo) VALUES 
            (:nombre, :email,:valoracion, :servicio, :nuevaResenia, :recibiremail)";
        
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' =>  $res->getNombre(),
                'email' =>  $res->getEmail(),
                'valoracion' =>  $res->getValoracion(),
                'servicio' =>  $res->getServicio(),
                'nuevaResenia' =>  $res->getResenia(),
                'recibiremail' =>  $res->getRecibirPromo()
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
                                       resenia = :nuevaResenia, recibir_promo = :recibiremail WHERE resenia_id=:id";

            $sentencia = $this->con->prepare($sql);
            $data = [            
                'nombre' =>  $res->getNombre(),
                'email' =>  $res->getEmail(),
                'valoracion' =>  $res->getValoracion(),
                'servicio' =>  $res->getServicio(),
                'nuevaResenia' =>  $res->getResenia(),
                'recibiremail' =>  $res->getRecibirPromo(),
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
            $sql = "DELETE FROM resenia WHERE resenia_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = ['id' =>  $res->getReseniaId()];
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
