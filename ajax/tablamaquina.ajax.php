<?php

require_once "../controladores/maquina.controlador.php";
require_once "../controladores/tipo_motor.controlador.php";
require_once "../modelos/maquina.modelo.php";
require_once "../modelos/rutas.php";

class TablaMaquina
{

    /*=============================================
    MOSTRAR LA TABLA DE MAQUINAS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $maquina = ControladorMaquina::ctrMostrarMaquina($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($maquina) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($maquina); $i++) {

            $item       = "id";
            $valor      = $maquina[$i]["id_tipomotor"];
            $respuesta1 = ControladorTipoMotor::ctrMostrarTipo($item, $valor);
            $tipo       = $respuesta1["nombre"];
            /*=============================================
            TRAER FOTO USUARIO
            =============================================*/

            if ($maquina[$i]["imagen"] != "") {

                $imagen = "<img class='img-circle' src='" . $url . $maquina[$i]["imagen"] . "' width='60px'>";

            } else {

                $imagen = "<img class='img-circle' src='vistas/img/maquina/default/default.jpg' width='60px'>";
            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarMaquina' idMaquina='" . $maquina[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarMaquina'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMaquina' idMaquina='" . $maquina[$i]["id"] . "' fotoMaquina='" . $maquina[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $maquina[$i]["nombre"] . '",
              "' . $maquina[$i]["detalles"] . '",
              "' . $imagen . '",
              "' . $tipo . '",
              "' . $maquina[$i]["marca"] . '",
              "' . $maquina[$i]["amperios"] . '",
              "' . $maquina[$i]["tamano"] . '",
              "' . $maquina[$i]["watts"] . '",
              "' . $maquina[$i]["hp"] . '",
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
ACTIVAR TABLA DE MAQUINA
=============================================*/
$activar = new TablaMaquina();
$activar->mostrarTabla();
