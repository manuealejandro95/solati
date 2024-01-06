<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcUpdateProduct{
        public $enviardata;
        public function UpdateProductView(){
            $datosenvia = $this->enviardata;
            if (isset($datosenvia["correo"]) && isset($datosenvia["nombres"])){
                    $respuesta = Mvccontroller::UpdateProductController($datosenvia);
                    echo $respuesta;
                }else{
                    echo "3";
                }
        }
    }

    $data = new MvcUpdateProduct();
    $data -> enviardata = array("id"=>$_POST["id"],
                                "correo"=>ucwords(strtolower($_POST["correo"])),
                                "nombres"=>$_POST["nombres"],
                                "contrasena"=>$_POST["contrasena"]);
    $data -> UpdateProductView();