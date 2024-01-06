<?php
class General{
    public static function mensajeexito($mensaje)
    {
        $dato = array(
            "Id" => "1",
            "Mensaje" => $mensaje,
            "Error" => false
        );

        return $dato;
    }

    public static function mensajeerror($id,$mensaje)
    {
        $dato = array(
            "Id" => $id,
            "Mensaje" => $mensaje,
            "Error" => true
        );

        return $dato;
    }
}
