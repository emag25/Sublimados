<!--  AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER  -->

<?php

class Domicilio {

    private $domicilio_id, $cedula, $celular, $correo, $postal, $referencias, 
    $tipo_envio, $productos, $ciudad;

    function __construct() { }

    
    function getDomicilioId() {
        return $this->domicilio_id;
    }

    function setDomicilioId($domicilio_id) {
        $this->domicilio_id = $domicilio_id;
    }

    function getCedula() {
        return $this->cedula;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function getCelular() {
        return $this->celular;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function getPostal() {
        return $this->postal;
    }

    function setPostal($postal) {
        $this->postal = $postal;
    }

    function getReferencias() {
        return $this->referencias;
    }

    function setReferencias($referencias) {
        $this->referencias = $referencias;
    }

    function getTipoEnvio() {
        return $this->tipo_envio;
    }

    function setTipoEnvio($tipo_envio) {
        $this->tipo_envio = $tipo_envio;
    }

    function getProductos() {
        return $this->productos;
    }

    function setProductos($productos) {
        $this->productos = $productos;
    }

    function getCiudad() {
        return $this->ciudad;
    }
 
    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

}
