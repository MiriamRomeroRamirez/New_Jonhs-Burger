<?php

require_once "../controladores/otros.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../modelos/otros.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/rutas.php";

class TablaProductosOtros
{

    /*=============================================
    MOSTRAR LA TABLA DE OTROS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $productos = ControladorOtros::ctrMostrarOtros($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($productos) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($productos); $i++) {

            $item       = "id_otros";
            $valor      = $productos[$i]["id"];
            $respuesta1 = ControladorProductos::ctrMostrarProductosInfo($item, $valor);
            $cantidad   = $respuesta1["cantidad"];
            $precio     = $respuesta1["precio"];
            /*=============================================
            TRAER FOTO OTROS PRODUCTOS
            =============================================*/

            if ($productos[$i]["imagen"] != "") {

                $imagen = "<img class='img-circle' src='" . $url . $productos[$i]["imagen"] . "' width='60px'>";

            } else {

                $imagen = "<img class='img-circle' src='vistas/img/otros/default/default.jpg' width='60px'>";
            }

            $opciones = "<div class='btn-group'><button class='btn btn-danger btnAgregarProductos' idProducto='" . $respuesta1["id"] . "' imagenProducto='" . $url . $productos[$i]["imagen"] . "'  nombreProducto='" . $productos[$i]["nombre"] . "'  precioProducto='" . $respuesta1["precio"] . "' modeloProducto='" . $productos[$i]["modelo"] . "'><i class='fa fa-plus'></i></button></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . $opciones . '",
             "' . $imagen . '",
              "' . $productos[$i]["nombre"] . '",
              "' . $productos[$i]["marca"] . '",
              "' . $productos[$i]["modelo"] . '",
               "' . $cantidad . '",
              "' . $precio . '"
            ],';

        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

    }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE OTROS
=============================================*/
$activar = new TablaProductosOtros();
$activar->mostrarTabla();
