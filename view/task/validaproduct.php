    <?php   

    require_once "../../controller/controller.php";
    require_once "../../model/acciones.php";

    class Validaproducto{
        public $identificacionproducto;

        public function validaproductoview(){
            $id = $this->identificacionproducto;
            $respuesta = MvcController::validaProductcontroller($id);
            echo $respuesta;
        }
    }
    $dato = json_decode(file_get_contents('php://input'),true);
    $id = new Validaproducto();
    $id -> identificacionproducto = $dato["codproduct"];
    $id -> validaproductoview();