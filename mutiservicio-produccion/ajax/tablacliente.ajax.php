<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";
require_once "../modelos/rutas.php";

class TablaCliente
{

    /*=============================================
    MOSTRAR LA TABLA DE CLIENTE
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $cliente = ControladorCliente::ctrMostrarCliente($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($cliente) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($cliente); $i++) {

            /*=============================================
            TRAER FOTO CLIENTE
            =============================================*/

            if ($cliente[$i]["foto"] != "") {

                $foto = "<img class='img-circle' src='" . $url . $cliente[$i]["foto"] . "' width='60px'>";

            } else {

                $foto = "<img class='img-circle' src='vistas/img/cliente/default/anonymous.png' width='60px'>";
            }

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if ($cliente[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idCliente='" . $cliente[$i]["id"] . "' estadoCliente='0' id='btnActivar'>Activado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idCliente='" . $cliente[$i]["id"] . "' estadoCliente='1'>Desactivado</button></td>";

            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='" . $cliente[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $cliente[$i]["nombre"] . ' ' . $cliente[$i]["apellidos"] . '",
              "' . $foto . '",
              "' . $cliente[$i]["telefono"] . '",
              "' . $cliente[$i]["documento"] . '",
              "' . $cliente[$i]["direccion"] . '",
              "' . $estado . '",
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
ACTIVAR TABLA DE CLIENTES
=============================================*/
$activar = new TablaCliente();
$activar->mostrarTabla();
