<?php
class MvcController {
    public function inicio(){
        include "view/template.php";
    }

    /*este metodo es de navegacion nos permite evitar otros enlaces en la url*/
    public function Enlacescontroller(){
        if(isset($_GET['action'])){
            $enlace = $_GET['action'];
        }else{
            $enlace = "index.php";
        }
        $respuesta = MvcModel::Enlacesmodel($enlace);
        include $respuesta;
    }

    public static function DatosProductscontroller(){
        $respuesta = datos::DatosProductsModel();
        return $respuesta;
    }

    public static function RegistrarProductController($datoscontroller){
        $respuesta = datos::registroProductmodel($datoscontroller, "usuarios");
        return $respuesta;
    }

    public static function UpdateProductController($datoscontroller){
        $respuesta = datos::UpdateProductmodel($datoscontroller,"usuarios");
        return $respuesta;
    }

    public static function DeleteProductController($idproductController){
        $respuesta = datos::DeleteProductModel($idproductController, "usuarios");
        return $respuesta;
    }

    public static function validaProductcontroller($idproductController){
        $respuesta = datos::validaProductmodel($idproductController, "usuarios");
        return $respuesta;
    }
}