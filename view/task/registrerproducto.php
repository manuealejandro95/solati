<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";
    require_once "../../model/General.php";

    class MvcRegistroProduct{
        public $enviardata;
        public function RegistrarProductView(){
            $datosenvia = $this->enviardata;
                if ($datosenvia["correo"] != "" && $datosenvia["nombres"] != ""){
                    $respuesta = Mvccontroller::RegistrarProductController($datosenvia);
                    echo $respuesta;
                }else{
                    $result = General::mensajeerror(3,"Error,una de las variables estan vacías");
                    echo json_encode($result);
                }
        }
    }
    $dato = json_decode(file_get_contents('php://input'),true);
    if(array_key_exists('correo', $dato) && array_key_exists('nombres', $dato) && array_key_exists('contrasena', $dato)){
        $data = new MvcRegistroProduct();
        $data -> enviardata = array("correo"=>ucwords(strtolower($dato["correo"])),
                                    "nombres"=>$dato["nombres"],
                                    "contrasena"=>$dato["contrasena"]);
        $data -> RegistrarProductView();
    }else{
        $result = General::mensajeerror(3,"Error,no se han encontrados las variables envidas. las variables a enviar son: correo, nombres y contrasena");
        echo json_encode($result);
    }