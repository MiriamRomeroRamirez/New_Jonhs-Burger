<?php
require_once "conexion.php";

class ModeloEmpleado
{

    /*=============================================
    MOSTRAR EMPLEADO
    =============================================*/

    public static function MdlMostrarEmpleado($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR EMPLEADO
    =============================================*/

    public static function mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2)
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
    REGISTRO DE EMPLEADO
    =============================================*/

    public static function mdlIngresarEmpleado($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellidos, documento, direccion, telefono, cargo, estado, email, foto) VALUES (:nombre, :apellidos, :documento, :direccion,  :telefono, :cargo, :estado, :email, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR PERFIL
    =============================================*/

    public static function mdlEditarEmpleado($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellidos =:apellidos, documento = :documento, direccion =:direccion,  telefono = :telefono, cargo =:cargo, email = :email, foto = :foto WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
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
    ELIMINAR EMPLEADO
    =============================================*/

    public static function mdlEliminarEmpleado($tabla, $datos)
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
