<?php
require_once "conexion.php";
require_once "General.php";
class datos extends Conexion
{

    public static function registroProductmodel($datos, $tabla)
    {
        $con = Conexion::getInstance()->Conectar();
        $contrasena = md5(strtolower($datos["contrasena"]));
        $query = "INSERT INTO $tabla (correo,nombreapellidos,contrasena) VALUES ('" . strtolower($datos["correo"]) . "','" . ucwords(strtolower($datos["nombres"])) . "','" . strtolower($contrasena) . "')";
        $stmt = pg_query($con, $query);


        if ($stmt) {
            $result = General::mensajeexito("Registro guardado con exito");
            return json_encode($result);
        } else {
            $result = General::mensajeerror(0,"Error al momento de guardar el registro");
            return json_encode($result);
        }
    }

    public static function UpdateProductmodel($datos, $tabla)
    {
        $con = Conexion::getInstance()->Conectar();
        $contrasena = md5(strtolower($datos["contrasena"]));
        $query = "UPDATE $tabla SET correo = '" . strtolower($datos["correo"]). "', nombreapellidos = '" . ucwords(strtolower($datos["nombres"])) . "', contrasena = '" . $contrasena . "'
        WHERE id='" . $datos["id"]. "'";
        $stmt = pg_query($con, $query);

        if ($stmt) {
            $result = General::mensajeexito("Registro modificado con exito");
            return json_encode($result);
        } else {
            $result = General::mensajeerror(0,"Error al momento de editar el registro");
            return json_encode($result);
        }
    }

    public static function DeleteProductModel($idproductmodel, $tabla)
    {
        $con = Conexion::getInstance()->Conectar();
        $query = "DELETE
        FROM $tabla
        WHERE id='" . $idproductmodel . "'";
        $stmt = pg_query($con, $query);

        if ($stmt) {
            $result = General::mensajeexito("Registro eliminado con exito");
            return json_encode($result);
        } else {
            $result = General::mensajeerror(0,"Error al momento de eliminar el registro");
            return json_encode($result);
        }
    }

    public static function validaProductmodel($idproductmodel, $tabla)
    {
        $conn = Conexion::getInstance()->Conectar();
        $query = "SELECT id, correo, nombreapellidos,contrasena FROM $tabla WHERE id = '" . $idproductmodel . "'";
        $result = pg_query($conn, $query);

        if ($result) {
            $json = [];
            while ($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)) {
                 $json[]= array(
                    'Id' => $row['id'],
                    'Correo' => $row['correo'],
                    'Nombre' => ucwords(strtolower($row['nombreapellidos'])),
                    'Password' => $row['contrasena']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;

            pg_close($conn);
        }else{
            $result = General::mensajeerror(0,"Error al momento de buscar el registro");
            return json_encode($result);
        }
    }

    public static function getdatosusuario($datos, $tabla)
    {
        $conn = Conexion::getInstance()->Conectar();
        $contrasena = md5(strtolower($datos["contrasena"]));
        $query = "SELECT correo, contrasena FROM $tabla WHERE correo = '" . strtolower($datos["correo"]) . "' AND contrasena = '" . $contrasena . "'";
        $result = pg_query($conn, $query);
        if ($result) {
            $json = [];
            while ($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)) {
                 $json[]= array(
                    'Correo' => $row['correo'],
                    'Password' => $row['contrasena']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;

            pg_close($conn);
        }else{
            $result = General::mensajeerror(0,"Error al momento de obtener el usuario");
            return json_encode($result);
        }
    }

    public static function DatosProductsModel()
    {
        $conn = Conexion::getInstance()->Conectar();
        $query = "SELECT id, correo, nombreapellidos,contrasena FROM usuarios ORDER BY id";
        $result = pg_query($conn, $query);

        if ($result) {
            $json = [];
            while ($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)) {
                 $json[]= array(
                    'Id' => $row['id'],
                    'Correo' => $row['correo'],
                    'Nombre' => $row['nombreapellidos'],
                    'Password' => $row['contrasena']
                );
            }
            $jsonstring = json_encode($json);
            return $jsonstring;

            pg_close($conn);
        }else{
            $result = General::mensajeerror(0,"Error al momento de obtener los registros");
            return json_encode($result);
        }
    }
}
