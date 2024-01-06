<?php   

    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class MvcDatosProducts{
        public function DatosProductsView(){
                    $respuesta = MvcController::DatosProductscontroller();
                    echo $respuesta;
        }
    }

    $data = new MvcDatosProducts();
    $data -> DatosProductsView();