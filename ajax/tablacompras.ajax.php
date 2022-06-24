<?php

require_once "../controladores/compras.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../controladores/proveedor.controlador.php";

require_once "../modelos/compras.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/proveedor.modelo.php";
require_once "../modelos/rutas.php";

class TablaCompras
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

            $item      = "id";
            $valor     = $compras[$i]["id_proveedor"];
            $respuesta = ControladorProveedor::ctrMostrarProveedorInfo($item, $valor);
            $proveedor = $respuesta["nombre"];

            if ($compras[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idCompra='" . $compras[$i]["id"] . "' estadoCompra='0' id='btnActivar'>Aceptado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idCompra='" . $compras[$i]["id"] . "' estadoCompra='1'>Anulado</button></td>";

            }

            //$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarMaquina' idMaquina='" . $compras[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarMaquina'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMaquina' idMaquina='" . $maquina[$i]["id"] . "' fotoMaquina='" . $maquina[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $compras[$i]["fecha"] . '",
              "' . $compras[$i]["id"] . '",
              "' . $proveedor . '",
              "' . $compras[$i]["comprobante"] . '",
              "' . $compras[$i]["num_doc"] . '",
              "' . $compras[$i]["total"] . '",
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
ACTIVAR TABLA DE COMPRAS
=============================================*/
$activar = new TablaCompras();
$activar->mostrarTabla();
