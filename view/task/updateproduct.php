<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";
    require_once "../../model/General.php";

    class MvcUpdateProduct{
        public $enviardata;
        public function UpdateProductView(){
            $datosenvia = $this->enviardata;
            if (isset($datosenvia["correo"]) && isset($datosenvia["nombres"])){
                    $respuesta = Mvccontroller::UpdateProductController($datosenvia);
                    echo $respuesta;
                }else{
                    $result = General::mensajeerror(3,"Error,no se han encontrados las variables envidas. las variables a enviar son: id,correo, nombres y contrasena");
                    echo json_encode($result);
                }
        }
    }
    $dato = json_decode(file_get_contents('php://input'),true);
    $data = new MvcUpdateProduct();
    $data -> enviardata = array("id"=>$dato["id"],
                                "correo"=>ucwords(strtolower($dato["correo"])),
                                "nombres"=>$dato["nombres"],
                                "contrasena"=>$dato["contrasena"]);
    $data -> UpdateProductView();