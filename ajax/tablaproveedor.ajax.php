<?php

require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedor.modelo.php";
require_once "../modelos/rutas.php";

class TablaProveedor
{

    /*=============================================
    MOSTRAR LA TABLA DE USUARIOS
    =============================================*/

    public function mostrarTabla()
    {

        $item  = null;
        $valor = null;

        // echo "<script>alert('everajax');</script>";

        $proveedor = ControladorProveedor::ctrMostrarProveedor($item, $valor);

        $url = Ruta::ctrRuta();

        if (count($proveedor) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;

        }

        $datosJson = '{

    "data": [ ';

        for ($i = 0; $i < count($proveedor); $i++) {

            /*=============================================
            TRAER FOTO USUARIO
            =============================================*/

            if ($proveedor[$i]["foto"] != "") {

                $foto = "<img class='img-circle' src='" . $url . $proveedor[$i]["foto"] . "' width='60px'>";

            } else {

                $foto = "<img class='img-circle' src='vistas/img/proveedor/default/anonymous.png' width='60px'>";
            }

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if ($proveedor[$i]["estado"] == 1) {

                $colorEstado   = "btn-danger";
                $textoEstado   = "Desactivado";
                $estadoUsuario = 0;

            } else {

                $colorEstado   = "btn-success";
                $textoEstado   = "Activado";
                $estadoUsuario = 1;

            }

            if ($proveedor[$i]["estado"] != 0) {

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idProveedor='" . $proveedor[$i]["id"] . "' estadoProveedor='0' id='btnActivar'>Activado</button></td>";

            } else {

                $estado = "<td><button class='btn btn-danger btn-xs btnActivar' idProveedor='" . $proveedor[$i]["id"] . "' estadoProveedor='1'>Desactivado</button></td>";

            }

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProveedor' idProveedor='" . $proveedor[$i]["id"] . "'  data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button></div>";

            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson .= '[
              "' . ($i + 1) . '",
              "' . $proveedor[$i]["nombre"] . ' ' . $proveedor[$i]["apellidos"] . '",
              "' . $foto . '",
              "' . $proveedor[$i]["email"] . '",
              "' . $proveedor[$i]["telefono"] . '",
              "' . $proveedor[$i]["direccion_web"] . '",
              "' . $estado . '",
              "' . $proveedor[$i]["ruc"] . '",
              "' . $proveedor[$i]["cod_proveedor"] . '",
              "' . $proveedor[$i]["tipo_persona"] . '",
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
ACTIVAR TABLA DE VENTAS
=============================================*/
$activar = new TablaProveedor();
$activar->mostrarTabla();
