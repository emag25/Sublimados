<!--AUTOR:SICHA VEGA BETSY ARLETTE-->
<?php

class Producto {

    private $disenio_id, $producto, $cliente, $telefono, $colores, $disenio, $modelo, $observaciones;

    function __construct() {
        
    }

   function getDisenioId() {
        return $this->disenio_id;
    }

    function getProducto() {
        return $this->producto;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getColores() {
        return $this->colores;
    }

    function getDisenio() {
        return $this->disenio;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    

    function setDisenioId($disenio_id) {
        $this->disenio_id = $disenio_id;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setColores($colores) {
        $this->colores = $colores;
    }

    function setDisenio($disenio) {
        $this->disenio = $disenio;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    
    

    public function __set($nombre, $valor) {

        if (property_exists('Producto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {

        if (property_exists('Producto', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}