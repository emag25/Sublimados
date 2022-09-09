<!--  AUTOR: QUITO YAMBAY RUTH MARIA  -->

<?php
// dto data transfer object
class Contacto {

    private $contacto_id, $nombre, $apellido, $celular, $email, $genero, $estado_civil, $intereses, 
    $fecha_nacimiento, $comentario;

   /*  function __construct() {    } */

    
    function getContactoId() {
        return $this->contacto_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getGenero() {
        return $this->genero;
    }

    function getEstadoCivil() {
        return $this->estado_civil;
    }

    function getIntereses() {
        return $this->intereses;
    }

    function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    function getComentario() {
        return $this->comentario;
    }



    function setContactoId($contacto_id) {
        $this->contacto_id = $contacto_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    function setResenia($resenia) {
        $this->resenia = $resenia;
    }

    function setEstadoCivil($estado_civil) {
        $this->estado_civil = $estado_civil;
    }

    function setIntereses($intereses) {
        $this->intereses = $intereses;
    }
    
    function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    
    public function __set($nombre, $valor) {
        if (property_exists('Contacto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Contacto', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}