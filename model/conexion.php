<?php
class Conexion
{

    static private $instance = null;

    private function __contruct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Conexion();
        }
        return self::$instance;
    }

    public function Conectar()
    {
        $server = "localhost";
        $user = "root";
        $database = "pruebasolati";
        $password = "123456";

        $conexion = pg_connect("host=".$server." dbname=".$database." user=".$user." password=".$password);

        if ($conexion) {
            
            return $conexion;
        } else {

            echo "Conexión no se pudo establecer.<br />";
        }
    }
}