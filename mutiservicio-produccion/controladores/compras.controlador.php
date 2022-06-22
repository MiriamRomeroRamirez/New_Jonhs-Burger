<?php

class ControladorCompras
{
    /*=============================================
    MOSTRAR TOTAL COMPRAS
    =============================================*/

    public static function ctrMostrarTotalCompras()
    {

        $tabla = "compras";

        $respuesta = ModeloCompras::mdlMostrarTotalCompras($tabla);

        return $respuesta;

    }

    public function ctrNuevasCompras($datos)
    {

        $tabla = "compras";

        $respuesta = ModeloCompras::mdlNuevasCompras($tabla, $datos);

        return $respuesta;

    }

    public function ctrDetalleCompras($datos, $idcompra)
    {

        $tabla = "detalles_compras";

        $respuesta = ModeloCompras::mdlDetalleCompras($tabla, $datos, $idcompra);

        return $respuesta;

    }

    public function ctrMostrarCompras($item, $valor)
    {

        $tabla = "compras";

        $respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrMostrarComprasInfo($item, $valor)
    {

        $tabla = "compras";

        $respuesta = ModeloCompras::mdlMostrarComprasInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrMostrarDetallesComprasInfo($item, $valor)
    {

        $tabla = "detalles_compras";

        $respuesta = ModeloCompras::mdlMostrarCompraDetallesInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrMostrarMaquina($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquina($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrMostrarRepuesto($item, $valor)
    {

        $tabla = "repuestos";

        $respuesta = ModeloRepuesto::mdlMostrarRepuesto($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrMostrarOtros($item, $valor)
    {

        $tabla = "otros";

        $respuesta = ModeloOtros::mdlMostrarOtros($tabla, $item, $valor);

        return $respuesta;
    }

}
