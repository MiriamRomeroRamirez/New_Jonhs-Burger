<?php

class ControladorDepartamento
{

    /*=============================================
    NUEVAS DEPARTAMENTO
    =============================================*/

    public static function ctrMostrarDepartamento($item, $valor)
    {

        $tabla = "departamento";

        $respuesta = ModeloDepartamento::mdlMostrarDepartamento($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarDepartamentoInfo($item, $valor)
    {

        $tabla = "departamento";

        $respuesta = ModeloDepartamento::mdlMostrarDepartamentoInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarProvincia($item, $valor)
    {

        $tabla = "provincia";

        $respuesta = ModeloDepartamento::mdlMostrarProvincia($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarProvinciaInfo($item, $valor)
    {

        $tabla = "provincia";

        $respuesta = ModeloDepartamento::mdlMostrarProvinciaInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarDistrito($item, $valor)
    {

        $tabla = "distrito";

        $respuesta = ModeloDepartamento::mdlMostrarProvincia($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarDistritoInfo($item, $valor)
    {

        $tabla = "distrito";

        $respuesta = ModeloDepartamento::mdlMostrarProvinciaInfo($tabla, $item, $valor);

        return $respuesta;
    }

}
