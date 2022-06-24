<?php

require_once "../controladores/ventas.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../controladores/cliente.controlador.php";

require_once "../modelos/ventas.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/cliente.modelo.php";
require_once "../modelos/rutas.php";

class TablaComprobantesVentas
{

    /*=============================================
    MOSTRAR LA TABLA DE MAQUINAS
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

            if ($ventas[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idVentas='" . $ventas[$i]["id"] . "' estadoVenta='0' id='btnActivar' readonly>Aceptado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idVentas='" . $ventas[$i]["id"] . "' estadoVenta='1' readonly>Anulado</button></td>";

            }

            if ($ventas[$i]["comprobante"] == "factura") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/facturaventa.php?idfactura=" . $ventas[$i]["id"] . "'class='btn btn-danger btnEditarMaquina' idCompras='" . $ventas[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";
            } else if ($ventas[$i]["comprobante"] == "boleta") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/boletaventa.php?idboleta=" . $ventas[$i]["id"] . "'class='btn btn-success btnEditarMaquina' idCompras='" . $ventas[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";

            } else if ($ventas[$i]["comprobante"] == "ticket") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/ticketventa.php?idticket=" . $ventas[$i]["id"] . "'class='btn btn-warnning btnEditarTicket' idCompras='" . $ventas[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";

            }

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $acciones . '",
              "' . $ventas[$i]["fecha"] . '",
              "' . $ventas[$i]["id"] . '",
              "' . $ventas[$i]["comprobante"] . '",
              "' . $ventas[$i]["num_doc"] . '",
              "' . $estado . '",
              "' . $ventas[$i]["total"] . '"

            ],';

        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

    }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE COMPROBANTES VENTAS
=============================================*/
$activar = new TablaComprobantesVentas();
$activar->mostrarTabla();
