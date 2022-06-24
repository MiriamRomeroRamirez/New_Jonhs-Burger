<?php
require_once "conexion.php";

class ModeloVentas
{

    public static function mdlMostrarTotalVentas($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    MOSTRAR VENTAS GRAFICO
    =============================================*/

    public static function mdlMostrarVentasGrafico($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    MOSTRAR VENTAS
    =============================================*/

    public static function mdlMostrarVentas($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    MOSTRAR VENTAS
    =============================================*/

    public static function mdlMostrarVentas1($tabla, $item, $valor)
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

    public static function mdlMostrarVentasInfo($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    public static function mdlMostrarVentaDetallesInfo($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR VENTA
    =============================================*/

    public static function mdlActualizarVenta($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3)
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

    public static function mdlDetalleVentas($tabla, $datos, $idventa)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idproductos, idventas, cantidad, precio, subtotal, titulo) VALUES (:idproductos, :idventas, :cantidad, :precio, :subtotal, :titulo)");

        $stmt->bindParam(":idproductos", $datos["idproductos"], PDO::PARAM_INT);
        $stmt->bindParam(":idventas", $idventa, PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $tmt = null;
    }

    /*=============================================
    NUEVAS VENTAS
    =============================================*/

    public static function mdlNuevasVentas($tabla, $datos)
    {
        $pdo  = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $tabla (comprobante, num_doc, id_cliente, total, estado, impuesto, serie, moneda) VALUES (:comprobante, :num_doc, :id_cliente, :total, :estado, :impuesto, :serie, :moneda)");

        $stmt->bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
        $stmt->bindParam(":num_doc", $datos["documento"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["idcliente"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
        $stmt->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            $id = $pdo->lastInsertId();

            return $id;

        } else {
            $id = 0;
            return "error";

        }

        $stmt->close();

        $tmt = null;
    }

    /*=============================================
    EDITAR VENTA
    =============================================*/

    /*public static function mdlEditarVenta($tabla, $datos)
{

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellidos =:apellidos,  documento = :documento, direccion =:direccion,  telefono = :telefono, foto = :foto, email = :email WHERE id = :id");

$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
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

}*/

}
