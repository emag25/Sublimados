<!--  AUTOR: QUITO YAMBAY RUTH MARIA  -->

<?php

require_once 'config/Conexion.php';

class ContactoDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectByState() {      
        $sql = "SELECT * FROM contacto WHERE estado = :state";
        $stmt = $this->con->prepare($sql);
        $data = ['state' => '1'];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }


    /*         CONSULTAR     */

    public function selectAll() {      
        $sql = "SELECT * FROM contacto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $result;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM contacto WHERE nombre = :name";
        $stmt = $this->con->prepare($sql);
        $data = ['name' => $name];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }



    /*             INSERTAR               */
    public function insert($cont) {
        try{
            $sql = "INSERT INTO contacto (nombre, apellido, celular, email, genero, estado_civil, intereses, fecha_nacimiento, comentario) VALUES 
            (:nombre, :apellido, :celular, :email, :genero, :estado, :intereses, :fecha, :comentario)";
        
            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $cont->getNombre(),
            'apellido' =>  $cont->getApellido(),
            'celular' =>  $cont->getCelular(),
            'email' =>  $cont->getEmail(),
            'genero' =>  $cont->getGenero(),
            'estado' =>  $cont->getEstadoCivil(),
            'intereses' =>  $cont->getIntereses(),
            'fecha' =>  $cont->getFechaNacimiento(),
            'comentario' =>  $cont->getComentario()
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


    /*          EDITAR            */
    public function selectById($id){
        $sql = "SELECT * FROM contacto WHERE contacto_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update($cont) {
        try{
            $sql = "UPDATE contacto SET nombre = :nombre, apellido = :apellido, celular = :celular, email = :email, genero = :genero, estado_civil = :estado, 
            intereses = :intereses, fecha_nacimiento = :fecha, comentario = :comentario WHERE contacto_id = :id"; 
        
            $sentencia = $this->con->prepare($sql);
            $data = [
            'id' =>  $cont->getContactoId(),
            'nombre' =>  $cont->getNombre(),
            'apellido' =>  $cont->getApellido(),
            'celular' =>  $cont->getCelular(),
            'email' =>  $cont->getEmail(),
            'genero' =>  $cont->getGenero(),
            'estado' =>  $cont->getEstadoCivil(),
            'intereses' =>  $cont->getIntereses(),
            'fecha' =>  $cont->getFechaNacimiento(),
            'comentario' =>  $cont->getComentario()
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


    /*           ELIMINAR           */

    public function delete($cont){
        try{        
            $sql = "DELETE FROM contacto WHERE contacto_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = [
                'id' =>  $cont->getContactoId(),                
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
