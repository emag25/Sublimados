<?php
class Conexion {
    public static function getConexion() {
        $dsn = "mysql:host=daw.mysql.database.azure.com;port=3306;dbname=superium";
        $conexion = null;
        try {
            $conexion = new PDO($dsn, 'milton@daw', 'Camaleon1');
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e;
            die("error " . $e->getMessage());
        }      
        return $conexion;
    }
}
