<?php

require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxCompras
{

    /*=============================================
    ACTIVAR COMPRAS
    =============================================*/

    public $activarCompra;
    public $activarId;

    public function ajaxActivarCompra()
    {

        $tabla = "compras";

        $item1  = "estado";
        $valor1 = $this->activarCompra;

        $item2  = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloCompras::mdlActualizarCompra($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }

    /*=============================================
    EDITAR COMPRAS
    =============================================*/

    public $idCompras;

    public function ajaxEditarCompras()
    {

        $item  = "id";
        $valor = $this->idMaquina;

        $respuesta = ControladorCompras::ctrMostrarComprasInfo($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
ACTIVAR COMPRA
=============================================*/

if (isset($_POST["activarCompra"])) {

    $activarCompras                = new AjaxCompras();
    $activarCompras->activarCompra = $_POST["activarCompra"];
    $activarCompras->activarId     = $_POST["activarId"];
    $activarCompras->ajaxActivarCompra();

}

if (isset($_POST["metodo"]) == "directo") {

    /*$productos = explode("-", $_POST['productos']);
    $cantidad = explode("-", $_POST['cantidad']);
    $pago = explode("-", $_POST['pago']);*/

    $idproductos = explode(",", $_POST["idProductoArray"]);
    $cantidad    = explode(",", $_POST["cantidadArray"]);
    $titulo      = explode(",", $_POST["tituloArray"]);
    $subtotal    = explode(",", $_POST["subtotalArray"]);

    $datos = array("idproveedor" => $_POST["idproveedor"],
        "comprobante"                => $_POST["comprobante"],
        "documento"                  => $_POST["documento"],
        "total"                      => $_POST["total"],
        "impuesto"                   => $_POST["impuesto"],
        "serie"                      => $_POST["serie"],
        "moneda"                     => "PEN",
        "estado"                     => 1);

    $respuesta = ControladorCompras::ctrNuevasCompras($datos);

    $idcompra = $respuesta;

    for ($i = 0; $i < count($idproductos); $i++) {

        $datos1 = array(
            "idproductos" => $idproductos[$i],
            "cantidad"    => $cantidad[$i],
            "titulo"      => $titulo[$i],
            "subtotal"    => $subtotal[$i]);

        //var_dump($datos);

        //$idcompra          = 10;
        $respuesta_detalle = ControladorCompras::ctrDetalleCompras($datos1, $idcompra);

        $ordenar = "id";
        $item    = "id";
        $valor   = $idproductos[$i];

        $productosCompra = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);
        foreach ($productosCompra as $key => $value) {

            $item1  = "ventas";
            $valor1 = $value["ventas"] + $cantidad[$i];
            $item2  = "id";
            $valor2 = $value["id"];

            $actualizarCompra = ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2);

        }

    }

    if ($respuesta == "ok") {
        echo "comprar";

    }

}
