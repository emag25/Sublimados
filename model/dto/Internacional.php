<!--  AUTOR: YANEZ GUILLEN PAULA ADRIANA  -->

<?php

class Internacional {
  
    private $id, $nombre,$apellido,$telefono, $email, $direccion, 
    $via, $pais, $info,$esp;

    function __construct() {
        
    }

   function getinternacionalId() {
        return $this->id;
    }

    

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getVia() {
        return $this->via;
    }

    function getPais() {
        return $this->pais;
    }

    
    function getinfo() {
        return $this->info;
    }

    
    function getesp() {
        return $this->esp;
    }

    function setInternacionalId($id) {
        $this->id = $id;
    }


    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setVia($via) {
        $this->via = $via;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setinfo($info) {
        $this->info = $info;
    }

    function setesp($esp) {
        $this->esp= $esp;
    }
    
    // Methods get y set parametrizados
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('envio_internacional', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
      // Verifica que exista la propiedad
        if (property_exists('envio_internacional', $nombre)) {
            return $this->$nombre;
        }
// Retorna null si no existe
        return NULL;
    }

    
    
}
