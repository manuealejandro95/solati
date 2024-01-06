<?php   

require_once "../../controller/controller.php";
require_once "../../model/acciones.php";
require_once "../../model/General.php";

class DeteleProduct{
    public $identificacionproducto;

    public function DeleteProductView(){
        $id = $this->identificacionproducto;
        if ($id["codproduct"]){
        $respuesta = MvcController::DeleteProductController($id);
        echo $respuesta;
        }else{
            $result = General::mensajeerror(3,"Error, la variable viene vacia");
            echo json_encode($result);
        }
    }
}
$dato = json_decode(file_get_contents('php://input'),true);
if(array_key_exists('codproduct', $dato)){
    $id = new DeteleProduct();
    $id -> identificacionproducto = $dato["codproduct"];
    $id -> DeleteProductView();
}else{
    $result = General::mensajeerror(3,"Error, debe enviar el id del producto a eliminar. la variable a enviar es: codproduct");
    echo json_encode($result);
}
