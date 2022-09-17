
<?php //AUTOR  YANEZ GUILLEN PAULA ADRIANA 

require_once 'config/Conexion.php';

class InternacionalDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }


    /*--  CONSULTAR  --*/

    public function selectAll() {      
        $sql = "SELECT * FROM envio_internacional,usuario WHERE usuario_id = id_usuario";

        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectByName($name) { 
        $sql = "SELECT * FROM envio_internacional,usuario WHERE (nombres like :name AND usuario_id = id_usuario)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $name . '%';
        $data = array('name' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
    }




    /*--  INSERTAR   --*/

    public function insert($inter) {
        try{
            $sql = "INSERT INTO envio_internacional (nombres,apellidos,telefono, email, direccion, recibir_via, pais,recibir_info,especificaciones, usuario_id) VALUES 
            (:nombre,:apellidos,:telefono,:email,:direccion, :recibir_via,:pais, :recibirinfo, :especificaciones, :usuario_id)";
        
            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $inter->getNombre(),
            'apellidos' =>  $inter->getApellido(),
            'telefono' =>  $inter->getTelefono(),
            'email' =>  $inter->getEmail(),
            'direccion' =>  $inter->getDireccion(),
            'recibir_via' =>  $inter->getVia(),
            'pais' =>  $inter->getPais(),
            'recibirinfo' =>  $inter->getinfo(),
            'especificaciones' =>  $inter->getesp(),
            'usuario_id' => $inter->getUsuarioId()
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




    /*--  EDITAR   --*/

    public function selectById($id){
        $sql = "SELECT * FROM envio_internacional WHERE internacional_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultados;
    }

    public function update($inter){
        try{

            
            $sql = "UPDATE `envio_internacional` SET `nombres` =:nombre,`apellidos` =:apellidos,`telefono`=:telefono,`email` =:email, 
            `direccion`=:direccion,`recibir_via` =:recibir_via,`pais`=:pais,`recibir_info`=:recibirinfo,`especificaciones`=:especificaciones
                                        WHERE internacional_id=:id";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'id' =>  $inter->getinternacionalId(),
            'nombre' =>  $inter->getNombre(),
            'apellidos' =>  $inter->getApellido(),
            'telefono' =>  $inter->getTelefono(),
            'email' =>  $inter->getEmail(),
            'direccion' =>  $inter->getDireccion(),
            'recibir_via' =>  $inter->getVia(),
            'pais' =>  $inter->getPais(),
            'recibirinfo' =>  $inter->getinfo(),
            'especificaciones' =>  $inter->getesp()

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


    /*--  ELIMINAR   --*/

    public function delete($inter){
        try{        
            $sql = "DELETE FROM envio_internacional WHERE internacional_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = [
                'id' =>  $inter->getinternacionalId(),                
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
