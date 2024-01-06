<?php
    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";
    require_once "../../model/General.php";

    class MvcGetUser{
        public $enviardata;
        public function getUserView(){
            $datosenvia = $this->enviardata;
            if (isset($datosenvia["correo"]) && isset($datosenvia["nombres"])){
                    $respuesta = Mvccontroller::getdatosusuariocontroller($datosenvia);
                    echo $respuesta;
                }else{
                    $result = General::mensajeerror(3,"Error,no se han encontrados las variables envidas. las variables a enviar son: correo y nombres");
                    return json_encode($result);
                }
        }
    }
    $dato = json_decode(file_get_contents('php://input'),true);
    $data = new MvcGetUser();
    $data -> enviardata = array(
                                "correo"=>ucwords(strtolower($dato["correo"])),
                                "contrasena"=>$dato["contrasena"]);
    $data -> getUserView();