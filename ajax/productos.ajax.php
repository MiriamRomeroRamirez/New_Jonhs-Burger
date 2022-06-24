<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos
{

    public $activarProducto;
    public $activarId;

    public function ajaxActivarProducto()
    {

        $tabla = "productos";

        $item1  = "estado";
        $valor1 = $this->activarProducto;

        $item2  = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloProductos::mdlActualizarProductoEstado($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }
    public $valor;
    public $item;
    public $ruta;

    public function ajaxVistaProducto()
    {

        $item1  = $this->item;
        $valor1 = $this->valor;

        $item2  = "ruta";
        $valor2 = $this->ruta;

        $respuesta = ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }

    /*=============================================
    TRAER EL PRODUCTO DE ACUERDO AL ID
    =============================================*/

    public $id;

    public function ajaxTraerProducto()
    {

        $item  = "id";
        $valor = $this->id;

        $respuesta = ControladorProductos::ctrMostrarProductosInfo($item, $valor);

        echo json_encode($respuesta);
    }

    public $idProducto;

    public function ajaxEditarProductos()
    {

        $item  = "id";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductosInfo($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
ACTIVAR PRODUCTO
=============================================*/

if (isset($_POST["activarProducto"])) {

    $activarPerfil                  = new AjaxProductos();
    $activarPerfil->activarProducto = $_POST["activarProducto"];
    $activarPerfil->activarId       = $_POST["activarId"];
    $activarPerfil->ajaxActivarProducto();

}

if (isset($_POST["valor"])) {

    $vista        = new AjaxProductos();
    $vista->valor = $_POST["valor"];
    $vista->item  = $_POST["item"];
    $vista->ruta  = $_POST["ruta"];
    $vista->ajaxVistaProducto();

}

if (isset($_POST["id"])) {

    $producto     = new AjaxProductos();
    $producto->id = $_POST["id"];
    $producto->ajaxTraerProducto();

}

if (isset($_POST["idProducto"])) {

    $editar1             = new AjaxProductos();
    $editar1->idProducto = $_POST["idProducto"];
    $editar1->ajaxEditarProductos();

}
