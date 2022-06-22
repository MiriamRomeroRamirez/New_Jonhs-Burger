<?php

require_once "../controladores/productos.controlador.php";
require_once "../controladores/maquina.controlador.php";
require_once "../controladores/repuesto.controlador.php";
require_once "../controladores/otros.controlador.php";

require_once "../modelos/maquina.modelo.php";
require_once "../modelos/productos.modelo.php";
require_once "../modelos/repuesto.modelo.php";
require_once "../modelos/otros.modelo.php";
require_once "../modelos/rutas.php";

class TablaProductos
{

    /*=============================================
    MOSTRAR LA TABLA DE INVENTARIO PRODUCTOS
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

            $nombre = "";
            $marca  = "";
            $imagen = "";

            if ($productos[$i]["clasificacion"] == "maquinas") {

                $item       = "id";
                $valor      = $productos[$i]["id_maquinas"];
                $respuesta1 = ControladorMaquina::ctrMostrarMaquinaInfo($item, $valor);
                $nombre     = $respuesta1["nombre"];
                $marca      = $respuesta1["marca"];

                if ($respuesta1["imagen"] != "") {

                    $imagen = "<img class='img-circle' src='" . $url . $respuesta1["imagen"] . "' width='60px'>";

                } else {

                    $imagen = "<img class='img-circle' src='vistas/img/maquina/default/default.jpg' width='60px'>";
                }

            } else if ($productos[$i]["clasificacion"] == "repuestos") {

                $item1      = "id";
                $valor1     = $productos[$i]["id_repuestos"];
                $respuesta2 = ControladorRepuesto::ctrMostrarRepuestoInfo($item1, $valor1);
                $nombre     = $respuesta2["nombre"];
                $marca      = $respuesta2["marca"];

                if ($respuesta2["imagen"] != "") {

                    $imagen = "<img class='img-circle' src='" . $url . $respuesta2["imagen"] . "' width='60px'>";

                } else {

                    $imagen = "<img class='img-circle' src='vistas/img/repuesto/default/default.jpg' width='60px'>";
                }

            } else if ($productos[$i]["clasificacion"] == "otros") {

                $item2      = "id";
                $valor2     = $productos[$i]["id_otros"];
                $respuesta3 = ControladorOtros::ctrMostrarOtrosInfo($item2, $valor2);
                $nombre     = $respuesta3["nombre"];
                $marca      = $respuesta3["marca"];

                if ($respuesta3["imagen"] != "") {

                    $imagen = "<img class='img-circle' src='" . $url . $respuesta3["imagen"] . "' width='60px'>";

                } else {

                    $imagen = "<img class='img-circle' src='vistas/img/otros/default/default.jpg' width='60px'>";
                }

            }

            if ($productos[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idProducto='" . $productos[$i]["id"] . "' estadoProducto='0' id='btnActivar'>Activado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idProducto='" . $productos[$i]["id"] . "' estadoProducto='1'>Desactivado</button></td>";

            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProductos' idProducto='" . $productos[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarProductos'><i class='fa fa-pencil'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
                  "' . ($i + 1) . '",
                  "' . $productos[$i]["clasificacion"] . '",
                  "' . $nombre . '",
                  "' . $imagen . '",
                  "' . $marca . '",
                  "' . $productos[$i]["precio"] . '",
                  "' . $productos[$i]["cantidad"] . '",
                  "' . $estado . '",
                  "' . $productos[$i]["ventas"] . '",
                 "' . $productos[$i]["fecha"] . '",
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
$activar = new TablaProductos();
$activar->mostrarTabla();
