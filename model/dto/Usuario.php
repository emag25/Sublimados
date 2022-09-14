<?php

class Usuario {

    private $usuario_id, $nombre, $contrasenia, $rol, $activo;

    function __construct() {    }

    function getUsuarioId() {
        return $this->usuario_id;
    }

    function getActivo() {
        return $this->activo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function getRol() {
        return $this->rol;
    }

    function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }
    
    public function __set($nombre, $valor) {
        if (property_exists('Usuario', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Usuario', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}
