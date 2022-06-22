<?php
require_once "conexion.php";

class ModeloProveedor
{

    /*=============================================
    MOSTRAR PROVEEDOR
    =============================================*/

    public static function mdlMostrarProveedor($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    public static function mdlMostrarProveedorInfo($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR PROVEEDOR
    =============================================*/

    public static function mdlActualizarProveedor($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    REGISTRO DE PROVEEDOR
    =============================================*/

    public static function mdlIngresarProveedor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellidos,tienda, documento, direccion_web, tipo_persona, telefono, cod_proveedor, ruc, email, foto, estado) VALUES (:nombre, :apellidos, :tienda, :documento, :direccion_web, :tipo_persona, :telefono, :cod_proveedor, :ruc, :email, :foto, :estado)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tienda", $datos["tienda"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_web", $datos["direccion_web"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_persona", $datos["tipo_persona"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":cod_proveedor", $datos["cod_proveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR PROVEEDOR
    =============================================*/

    public static function mdlEditarProveedor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellidos =:apellidos, tienda = :tienda, documento = :documento, direccion_web =:direccion_web, tipo_persona =:tipo_persona, telefono = :telefono, ruc = :ruc, email = :email, foto = :foto WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tienda", $datos["tienda"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_web", $datos["direccion_web"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_persona", $datos["tipo_persona"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ELIMINAR PROVEEDOR
    =============================================*/

    public static function mdlEliminarProveedor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}
