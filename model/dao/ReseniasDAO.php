<?php

require_once 'config/Conexion.php';

class ReseniasDAO {

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
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
        $sql = "SELECT * FROM resenia WHERE nombre = :name";
       
        $stmt = $this->con->prepare($sql);
        $data = ['name' => $name];
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

    public function update($res){

        try{
            $sql = "UPDATE `resuctos` SET `prod_codigo`=:cod,`prod_nombre`=:nom,`prod_descripcion`=:desc," .
                    "`prod_estado`=:estado,`prod_precio`=:precio,`prod_idCategoria`=:idCat,`prod_usuarioActualizacion`=:usu," .
                    "`prod_fechaActualizacion`=:fecha WHERE prod_id=:id";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'cod' =>  $res->getCodigo(),
                'nom' =>  $res->getNombre(),
                'desc' =>  $res->getDescripcion(),
                'estado' =>  $res->getEstado(),
                'precio' =>  $res->getPrecio(),
                'idCat' =>  $res->getIdCategoria(),
                'usu' =>  $res->getUsuario(),
                'fecha' =>  $res->getFechaActualizacion(),
                'id' =>  $res->getId()
            ];
            $sentencia->execute($data);

            if ($sentencia->rowCount() <= 0) {
                return false;
            }

        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        
        return true;       
    }




    /*--  ELIMINAR RESEÑA  --*/

    public function delete($res){
        try{        
            $sql = "DELETE FROM resenia WHERE resenia_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = [
                'id' =>  $res->getReseniaId(),                
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
