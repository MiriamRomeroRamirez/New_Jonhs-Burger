<?php

require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedor.modelo.php";

class AjaxProveedor
{

    /*=============================================
    ACTIVAR Proveedor
    =============================================*/

    public $activarProveedor;
    public $activarId;

    public function ajaxActivarProveedor()
    {

        $tabla = "proveedor";

        $item1  = "estado";
        $valor1 = $this->activarProveedor;

        $item2  = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloProveedor::mdlActualizarProveedor($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }

    /*=============================================
    EDITAR PROVEEDOR
    =============================================*/

    public $idProveedor;

    public function ajaxEditarProveedor()
    {

        $item  = "id";
        $valor = $this->idProveedor;

        $respuesta = ControladorProveedor::ctrMostrarProveedor($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
ACTIVAR PROVEEDOR
=============================================*/

if (isset($_POST["activarProveedor"])) {

    $activarPerfil                   = new AjaxProveedor();
    $activarPerfil->activarProveedor = $_POST["activarProveedor"];
    $activarPerfil->activarId        = $_POST["activarId"];
    $activarPerfil->ajaxActivarProveedor();

}

/*=============================================
EDITAR PROVEEDOR
=============================================*/
if (isset($_POST["idProveedor"])) {

    $editar              = new AjaxProveedor();
    $editar->idProveedor = $_POST["idProveedor"];
    $editar->ajaxEditarProveedor();

}
