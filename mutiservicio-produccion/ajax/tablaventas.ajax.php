<?php

require_once "../controladores/ventas.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../controladores/cliente.controlador.php";

require_once "../modelos/ventas.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/cliente.modelo.php";
require_once "../modelos/rutas.php";

class TablaVentas
{

    /*=============================================
    MOSTRAR LA TABLA DE VENTAS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($ventas) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($ventas); $i++) {

            $item      = "id";
            $valor     = $ventas[$i]["id_cliente"];
            $respuesta = ControladorCliente::ctrMostrarClienteInfo($item, $valor);
            $cliente   = $respuesta["nombre"];

            if ($ventas[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idVenta='" . $ventas[$i]["id"] . "' estadoVenta='0' id='btnActivar'>Aceptado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idVenta='" . $ventas[$i]["id"] . "' estadoVenta='1'>Anulado</button></td>";

            }

            //$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarMaquina' idMaquina='" . $compras[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarMaquina'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMaquina' idMaquina='" . $maquina[$i]["id"] . "' fotoMaquina='" . $maquina[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $ventas[$i]["fecha"] . '",
              "' . $ventas[$i]["id"] . '",
              "' . $cliente . '",
              "' . $ventas[$i]["comprobante"] . '",
              "' . $ventas[$i]["num_doc"] . '",
              "' . $ventas[$i]["total"] . '",
              "' . $estado . '"

            ],';

        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

    }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/
$activar = new TablaVentas();
$activar->mostrarTabla();
