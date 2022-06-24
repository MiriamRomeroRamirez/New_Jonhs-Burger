<?php

require_once "../controladores/maquina.controlador.php";
require_once "../controladores/repuesto.controlador.php";
require_once "../modelos/repuesto.modelo.php";
require_once "../modelos/maquina.modelo.php";
require_once "../modelos/rutas.php";

class TablaRepuesto
{

    /*=============================================
    MOSTRAR LA TABLA DE REPUESTO
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $repuesto = ControladorRepuesto::ctrMostrarRepuesto($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($repuesto) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($repuesto); $i++) {

            $item       = "id";
            $valor      = $repuesto[$i]["id_maquinas"];
            $respuesta1 = ControladorMaquina::ctrMostrarMaquinaInfo($item, $valor);
            $maquina    = $respuesta1["nombre"];
            /*=============================================
            TRAER FOTO USUARIO
            =============================================*/

            if ($repuesto[$i]["imagen"] != "") {

                $imagen = "<img class='img-circle' src='" . $url . $repuesto[$i]["imagen"] . "' width='60px'>";

            } else {

                $imagen = "<img class='img-circle' src='vistas/img/repuesto/default/default.jpg' width='60px'>";
            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarRepuesto' idRepuesto='" . $repuesto[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarRepuesto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarRepuesto' idRepuesto='" . $repuesto[$i]["id"] . "' fotoRepuesto='" . $repuesto[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $repuesto[$i]["nombre"] . '",
              "' . $repuesto[$i]["detalles"] . '",
              "' . $repuesto[$i]["especificaciones"] . '",
              "' . $imagen . '",
              "' . $repuesto[$i]["marca"] . '",
              "' . $repuesto[$i]["color"] . '",
              "' . $maquina . '",
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
ACTIVAR TABLA DE REPUESTO
=============================================*/
$activar = new TablaRepuesto();
$activar->mostrarTabla();
