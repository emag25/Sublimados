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

    public function insert($prod){
        try{

        $sql = "INSERT INTO resenia (resenia_id, nombre, email, valoracion, servicio, resenia, recibir_promo, estado) VALUES 
        (:id, :nom, :email, :estado, :precio, :idCat, :usu, :fecha)";

    
        $sentencia = $this->con->prepare($sql);
        $data = [
        'cod' =>  $prod->getCodigo(),
        'nom' =>  $prod->getNombre(),
        'desc' =>  $prod->getDescripcion(),
        'estado' =>  $prod->getEstado(),
        'precio' =>  $prod->getPrecio(),
        'idCat' =>  $prod->getIdCategoria(),
        'usu' =>  $prod->getUsuario(),
        'fecha' =>  $prod->getFechaActualizacion()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
           return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }




    /*--  EDITAR RESEÑA  --*/

    public function update($prod){

        try{
            //prepare
            $sql = "UPDATE `productos` SET `prod_codigo`=:cod,`prod_nombre`=:nom,`prod_descripcion`=:desc," .
                    "`prod_estado`=:estado,`prod_precio`=:precio,`prod_idCategoria`=:idCat,`prod_usuarioActualizacion`=:usu," .
                    "`prod_fechaActualizacion`=:fecha WHERE prod_id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'cod' =>  $prod->getCodigo(),
                'nom' =>  $prod->getNombre(),
                'desc' =>  $prod->getDescripcion(),
                'estado' =>  $prod->getEstado(),
                'precio' =>  $prod->getPrecio(),
                'idCat' =>  $prod->getIdCategoria(),
                'usu' =>  $prod->getUsuario(),
                'fecha' =>  $prod->getFechaActualizacion(),
                'id' =>  $prod->getId()
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
            return true;       
    }




    /*--  ELIMINAR RESEÑA  --*/

    public function delete($prod){
        try{
        
            $sql = "UPDATE `productos` SET `prod_estado`=0,`prod_usuarioActualizacion`=:usu," .
            "`prod_fechaActualizacion`=:fecha WHERE prod_id=:id";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'usu' =>  $prod->getUsuario(),
            'fecha' =>  $prod->getFechaActualizacion(),
            'id' =>  $prod->getId()
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
    
}
