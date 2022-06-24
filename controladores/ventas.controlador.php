<?php

class ControladorVentas
{

    public static function ctrMostrarTotalVentas()
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarTotalVentas($tabla);

        return $respuesta;

    }

    /*=============================================
    NUEVAS VENTAS
    =============================================*/

    public static function ctrNuevasVentas($datos)
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlNuevasVentas($tabla, $datos);

        return $respuesta;

    }

    public static function ctrDetalleVentas($datos, $idcompra)
    {

        $tabla = "detalles_ventas";

        $respuesta = ModeloVentas::mdlDetalleVentas($tabla, $datos, $idcompra);

        return $respuesta;

    }

    public static function ctrMostrarVentas($item, $valor)
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarVentas1($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarVentasGrafico()
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarVentasGrafico($tabla);

        return $respuesta;

    }

    public static function ctrMostrarVentasInfo($item, $valor)
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarVentasInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarDetallesVentasInfo($item, $valor)
    {

        $tabla = "detalles_ventas";

        $respuesta = ModeloVentas::mdlMostrarVentaDetallesInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarMaquina($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquina($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarRepuesto($item, $valor)
    {

        $tabla = "repuestos";

        $respuesta = ModeloRepuesto::mdlMostrarRepuesto($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarOtros($item, $valor)
    {

        $tabla = "otros";

        $respuesta = ModeloOtros::mdlMostrarOtros($tabla, $item, $valor);

        return $respuesta;
    }

}
