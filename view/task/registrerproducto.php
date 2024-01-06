<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcRegistroProduct{
        public $enviardata;
        public function RegistrarProductView(){
            $datosenvia = $this->enviardata;
                if (isset($datosenvia["correo"]) && isset($datosenvia["nombres"])){
                    $respuesta = Mvccontroller::RegistrarProductController($datosenvia);
                    echo $respuesta;
                }else{
                    echo "3";
                }
        }
    }

    $data = new MvcRegistroProduct();
    $data -> enviardata = array("correo"=>ucwords(strtolower($_POST["correo"])),
                                "nombres"=>$_POST["nombres"],
                                "contrasena"=>$_POST["contrasena"]);
    $data -> RegistrarProductView();