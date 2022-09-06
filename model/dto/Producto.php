<?php

class Producto {

    private $disenio_id, $producto, $cliente, $disenio, $modelo, $estado;

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

    function getDisenio() {
        return $this->disenio;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getEstado() {
        return $this->estado;
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

    function setDisenio($disenio) {
        $this->disenio = $disenio;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
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