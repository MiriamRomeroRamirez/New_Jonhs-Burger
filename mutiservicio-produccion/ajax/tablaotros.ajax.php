<?php

require_once "../controladores/otros.controlador.php";
require_once "../modelos/otros.modelo.php";
require_once "../modelos/rutas.php";

class TablaOtros
{

    /*=============================================
    MOSTRAR LA TABLA DE OTROS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $otros = ControladorOtros::ctrMostrarOtros($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($otros) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($otros); $i++) {

            /*=============================================
            TRAER FOTO OTROS PRODUCTOS
            =============================================*/

            if ($otros[$i]["imagen"] != "") {

                $imagen = "<img class='img-circle' src='" . $url . $otros[$i]["imagen"] . "' width='60px'>";

            } else {

                $imagen = "<img class='img-circle' src='vistas/img/otros/default/default.jpg' width='60px'>";
            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarOtros' idOtros='" . $otros[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarOtros'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarOtros' idOtros='" . $otros[$i]["id"] . "' fotoOtros='" . $otros[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $otros[$i]["nombre"] . '",
              "' . $otros[$i]["modelo"] . '",
              "' . $otros[$i]["especificaciones"] . '",
              "' . $imagen . '",
              "' . $otros[$i]["marca"] . '",
              "' . $otros[$i]["color"] . '",
              "' . $otros[$i]["tamano"] . '",
              "' . $acciones . '"
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
$activar = new TablaOtros();
$activar->mostrarTabla();
