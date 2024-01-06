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

    $id = new Validaproducto();
    $id -> identificacionproducto = $_POST["codproduct"];
    $id -> validaproductoview();