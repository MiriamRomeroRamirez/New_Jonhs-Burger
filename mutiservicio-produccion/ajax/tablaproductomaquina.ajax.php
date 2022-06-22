<?php

require_once "../controladores/maquina.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../modelos/maquina.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/rutas.php";

class TablaProductosMaquina
{

    /*=============================================
    MOSTRAR LA TABLA DE MAQUINA
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($productos) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($productos); $i++) {

            if ($productos[$i]["clasificacion"] == "maquinas") {

                $item       = "id";
                $valor      = $productos[$i]["id_maquinas"];
                $respuesta1 = ControladorMaquina::ctrMostrarMaquinaInfo($item, $valor);

                if ($respuesta1["imagen"] != "") {

                    $imagen = "<img class='img-circle' src='" . $url . $respuesta1["imagen"] . "' width='60px'>";

                } else {

                    $imagen = "<img class='img-circle' src='vistas/img/otros/default/default.jpg' width='60px'>";
                }

                $opciones = "<div class='btn-group'><button class='btn btn-danger btnAgregarProductos' idProducto='" . $productos[$i]["id"] . "' imagenProducto='" . $url . $respuesta1["imagen"] . "'  nombreProducto='" . $respuesta1["nombre"] . "'  precioProducto='" . $productos[$i]["precio"] . "' detallesProducto='" . $respuesta1["detalles"] . "'><i class='fa fa-plus'></i></button></div>";

                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/

                $datosJson .= '[
                  "' . $opciones . '",
                  "' . $imagen . '",
                  "' . $respuesta1["nombre"] . '",
                  "' . $respuesta1["marca"] . '",
                  "' . $respuesta1["detalles"] . '",
                  "' . $productos[$i]["cantidad"] . '",
                  "' . $productos[$i]["precio"] . '"
                ],';

            }
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

    }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE MAQUINA
=============================================*/
$activar = new TablaProductosMaquina();
$activar->mostrarTabla();
