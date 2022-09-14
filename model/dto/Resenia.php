<?php  //  AUTOR: APRAEZ GONZALEZ EMELY MISHELL

class Resenia {

    private $resenia_id, $nombre, $email, $valoracion, $servicio, $resenia, 
    $recibir_promo, $estado, $usuario_id;

    function __construct() {    }

    
    function getReseniaId() {
        return $this->resenia_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getValoracion() {
        return $this->valoracion;
    }

    function getServicio() {
        return $this->servicio;
    }

    function getResenia() {
        return $this->resenia;
    }

    function getRecibirPromo() {
        return $this->recibir_promo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getUsuarioId() {
        return $this->usuario_id;
    }



    function setReseniaId($resenia_id) {
        $this->resenia_id = $resenia_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    function setResenia($resenia) {
        $this->resenia = $resenia;
    }

    function setRecibirPromo($recibir_promo) {
        $this->recibir_promo = $recibir_promo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }  
    
    function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }  

    
    public function __set($nombre, $valor) {
        if (property_exists('Resenia', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Resenia', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}
