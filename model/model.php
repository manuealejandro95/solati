<?php
class MvcModel{
    public static function  Enlacesmodel ($enlace){
        if ($enlace == "productos"){
            $module = "view/views/$enlace.php";
        }elseif ($enlace == "index"){
            $module = "view/views/productos.php";
        }else {
            $module = "view/views/productos.php";
        }
        return $module;
    }
}
