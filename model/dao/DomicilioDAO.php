<?php // AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER 

require_once 'config/Conexion.php';

class DomicilioDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll() {      
        $sql = "SELECT * FROM envio_domicilio";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
      
        return $resultados;
    }

    public function selectMatches($parametro){
        // sql de la sentencia
        $sql = "SELECT * FROM  envio_domicilio where (ciudad like :b2)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $parametro . '%';
        $data = array('b2' => $conlike);
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

        if(!empty($resultados)){
            return $resultados;
            echo var_dump($resultados);
        }else{
            //retornar resultados
            return $this->selectAll();
        }
        
    }

    public function insert($prod){
        try{
            if(!isset($_SESSION)){ 
                session_start();
              }
            //sentencia sql
            $sql = "insert into envio_domicilio(cedula, celular, correo, postal, referencias,tipo_envio, productos,ciudad,usuario_id) ".
            "values(:cedula, :celular,:correo, :postal, :referencias, :gen,:env,:cities,:usuario_id)";
            echo $sql;
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'cedula' => $prod->getCedula(),
                'celular' => $prod->getCelular(),
                'correo'=>$prod->getCorreo(),
                'postal' => $prod->getPostal(),
                'referencias' =>$prod->getReferencias(),
                'gen' =>$prod->getTipoEnvio(),
                'env' => $prod->getProductos(),
                'cities'=>$prod->getCiudad(),
                'usuario_id'=>$_SESSION['id']
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
                return false;
            }
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function eliminar($prod){

        try{        
            $sql = "DELETE FROM envio_domicilio WHERE domicilio_id = :id";
            $sentencia = $this->con->prepare($sql); 
            $data = [
                'id' =>  $prod->getDomicilioId(),                
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

    public function selectById($id){
        $sql = "SELECT * FROM envio_domicilio WHERE domicilio_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultado;
    }

    public function update($prod){
        try{
            $sql = "UPDATE envio_domicilio SET cedula = :cedula, celular = :celular, correo = :correo, 
                                               postal = :postal, referencias = :referencias, tipo_envio = :tipo_envio, 
                                               productos = :productos, ciudad = :ciudad, usuario_id=:usuario_id WHERE domicilio_id = :id";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'id' =>  $prod->getDomicilioId(),
            'cedula' =>  $prod->getCedula(),
            'celular' =>  $prod->getCelular(),
            'correo' =>  $prod->getCorreo(),
            'postal' =>  $prod->getPostal(),
            'referencias' =>  $prod->getReferencias(),
            'tipo_envio' =>  $prod->getTipoEnvio(),
            'productos' =>  $prod->getProductos(),
            'ciudad' =>  $prod->getCiudad(),
            'usuario_id'=> $prod->getUsuarioId(),
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
