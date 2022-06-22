<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxVentas
{

    /*=============================================
    ACTIVAR VENTA
    =============================================*/

    public $activarVenta;
    public $activarId;

    public function ajaxActivarVenta()
    {

        $tabla = "ventas";

        $item1  = "estado";
        $valor1 = $this->activarVenta;

        $item2  = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloVentas::mdlActualizarVentas($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }

    /*=============================================
    EDITAR COMPRAS
    =============================================*/

    public $idVentas;

    public function ajaxEditarVentas()
    {

        $item  = "id";
        $valor = $this->idVentas;

        $respuesta = ControladorVentas::ctrMostrarVentasInfo($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    MOSTRAR COMPRAS
    =============================================*/

    public $mostrarId;

    public function ajaxMostrarVentas()
    {

        $item  = "id";
        $valor = $this->mostrarId;

        $respuesta = ControladorVentas::ctrMostrarVentasInfo($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
ACTIVAR VENTA
=============================================*/

if (isset($_POST["activarVenta"])) {

    $activarVentas                = new AjaxVentas();
    $activarVentas->activarVentas = $_POST["activarVentas"];
    $activarVentas->activarId     = $_POST["activarId"];
    $activarVentas->ajaxActivarVenta();

}

if (isset($_POST["Cantidad"])) {

    $mostrarVentas            = new AjaxVentas();
    $mostrarVentas->mostrarId = $_POST["idVenta"];
    $mostrarVentas->ajaxMostrarVenta();

}

if (isset($_POST["metodo"]) == "directo") {

    /*$productos = explode("-", $_POST['productos']);
    $cantidad = explode("-", $_POST['cantidad']);
    $pago = explode("-", $_POST['pago']);*/

    $idproductos = explode(",", $_POST["idProductoArray"]);
    $cantidad    = explode(",", $_POST["cantidadArray"]);
    $titulo      = explode(",", $_POST["tituloArray"]);
    $subtotal    = explode(",", $_POST["subtotalArray"]);
    $precio      = explode(",", $_POST["precioArray"]);

    $datos = array("idcliente" => $_POST["idcliente"],
        "comprobante"              => $_POST["comprobante"],
        "documento"                => $_POST["documento"],
        "total"                    => $_POST["total"],
        "impuesto"                 => $_POST["impuesto"],
        "serie"                    => $_POST["serie"],
        "moneda"                   => "PEN",
        "estado"                   => 1);

    $respuesta = ControladorVentas::ctrNuevasVentas($datos);

    $idventa = $respuesta;

    for ($i = 0; $i < count($idproductos); $i++) {

        $datos1 = array(
            "idproductos" => $idproductos[$i],
            "cantidad"    => $cantidad[$i],
            "titulo"      => $titulo[$i],
            "subtotal"    => $subtotal[$i],
            "precio"      => $precio[$i]);

        $respuesta_detalle = ControladorVentas::ctrDetalleVentas($datos1, $idventa);

        $ordenar = "id";
        $item    = "id";
        $valor   = $idproductos[$i];

        $productosCompra = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);
        foreach ($productosCompra as $key => $value) {

            $item3  = "ventas";
            $valor3 = $value["ventas"] + $cantidad[$i];
            $item1  = "cantidad";
            $valor1 = $value["cantidad"] - $cantidad[$i];
            $item2  = "id";
            $valor2 = $value["id"];

            $actualizarCompra = ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2, $item3, $valor3);

            if ($actualizarCompra == "ok") {
                echo "vender";

            }

        }

    }

}
