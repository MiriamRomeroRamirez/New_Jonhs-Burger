<?php

require_once "conexion.php";

class ModeloProductos
{

    public static function mdlMostrarTotalProductos($tabla, $orden)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }
    /*=============================================
    MOSTRAR MAQUINAS
    =============================================*/

    public static function mdlMostrarProductos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

    public static function mdlMostrarProductos1($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

    /*=============================================
    ACTUALIZAR PRODUCTO
    =============================================*/

    public static function mdlActualizarProductoEstado($tabla, $item1, $valor1, $item2, $valor2)
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

    public static function mdlMostrarProductosInfo($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    CREAR PRODUCTO
    =============================================*/

    public static function mdlIngresarProductos($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cantidad, precio, id_maquinas, id_repuestos, id_otros, clasificacion, estado) VALUES (:cantidad, :precio, :id_maquinas, :id_repuestos, :id_otros, :clasificacion, :estado)");

        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":id_maquinas", $datos["id_maquinas"], PDO::PARAM_INT);
        $stmt->bindParam(":id_repuestos", $datos["id_repuestos"], PDO::PARAM_INT);
        $stmt->bindParam(":id_otros", $datos["id_otros"], PDO::PARAM_INT);
        $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
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
    LISTAR PRODUCTOS
    =============================================*/

    public static function mdlListarProductos($tabla, $ordenar, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    public static function mdlEditarProductos($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad, precio = :precio WHERE id = :id");

        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
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
    ELIMINAR PRODUCTO
    =============================================*/

    public static function mdlEliminarProductos($tabla, $datos)
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

    /*=============================================
    ACTUALIZAR VISTA PRODUCTO
    =============================================*/

    public static function mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1,  $item3 = :$item3 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}
