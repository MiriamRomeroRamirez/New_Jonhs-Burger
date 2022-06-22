<?php

require_once "../controladores/compras.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../controladores/proveedor.controlador.php";

require_once "../modelos/compras.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/proveedor.modelo.php";
require_once "../modelos/rutas.php";

class TablaComprobantesCompras
{

    /*=============================================
    MOSTRAR LA TABLA DE MAQUINAS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        $compras = ControladorCompras::ctrMostrarCompras($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($compras) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($compras); $i++) {

            if ($compras[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idEmpleado='" . $compras[$i]["id"] . "' estadoEmpleado='0' id='btnActivar'>Aceptado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idEmpleado='" . $compras[$i]["id"] . "' estadoEmpleado='1'>Anulado</button></td>";

            }

            if ($compras[$i]["comprobante"] == "factura") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/facturacompra.php?idfactura=" . $compras[$i]["id"] . "'class='btn btn-danger btnEditarMaquina' idCompras='" . $compras[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";
            } else if ($compras[$i]["comprobante"] == "boleta") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/boletacompra.php?idboleta=" . $compras[$i]["id"] . "'class='btn btn-success btnEditarMaquina' idCompras='" . $compras[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";

            } else if ($compras[$i]["comprobante"] == "ticket") {

                $acciones = "<div class='btn-group'><a href='vistas/modulos/ticketcompra.php?idticket=" . $compras[$i]["id"] . "'class='btn btn-warnning btnEditarTicket' idCompras='" . $compras[$i]["id"] . "' ><i class='fa fa-file'></i></a></div>";

            }

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $acciones . '",
              "' . $compras[$i]["fecha"] . '",
              "' . $compras[$i]["id"] . '",
              "' . $compras[$i]["comprobante"] . '",
              "' . $compras[$i]["num_doc"] . '",
              "' . $estado . '",
              "' . $compras[$i]["total"] . '"

            ],';

        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']

    }';

        echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE COMPROBANTES COMPRAS
=============================================*/
$activar = new TablaComprobantesCompras();
$activar->mostrarTabla();
