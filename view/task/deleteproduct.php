<?php   

require_once "../../controller/controller.php";
require_once "../../model/acciones.php";

class DeteleProduct{
    public $identificacionproducto;

    public function DeleteProductView(){
        $id = $this->identificacionproducto;
        $respuesta = MvcController::DeleteProductController($id);
        echo $respuesta;
    }
}

$id = new DeteleProduct();
$id -> identificacionproducto = $_POST["codproduct"];
$id -> DeleteProductView();