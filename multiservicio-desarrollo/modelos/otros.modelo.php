<?php

require_once "conexion.php";

class ModeloOtros
{

    /*=============================================
    MOSTRAR Otros
    =============================================*/

    public static function mdlMostrarOtros($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    public static function mdlMostrarOtrosInfo($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    CREAR Otros
    =============================================*/

    public static function mdlIngresarOtros($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, modelo, especificaciones, marca,  imagen, color, tamano, fecha) VALUES (:nombre, :modelo, :especificaciones, :marca,  :imagen, :color, :tamano, :fecha)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":especificaciones", $datos["especificaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
        $stmt->bindParam(":tamano", $datos["tamano"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    public static function mdlEditarOtros($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, modelo = :modelo, especificaciones = :especificaciones, marca = :marca,  imagen = :imagen, color = :color, tamano = :tamano WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":especificaciones", $datos["especificaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
        $stmt->bindParam(":tamano", $datos["tamano"], PDO::PARAM_STR);
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
    ELIMINAR OTROS
    =============================================*/

    public static function mdlEliminarOtros($tabla, $datos)
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
