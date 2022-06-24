<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";

class AjaxCliente
{

    /*=============================================
    ACTIVAR CLIENTE
    =============================================*/

    public $activarCliente;
    public $activarId;

    public function ajaxActivarCliente()
    {

        $tabla = "cliente";

        $item1  = "estado";
        $valor1 = $this->activarCliente;

        $item2  = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloCliente::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;

    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public $idCliente;

    public function ajaxEditarCliente()
    {

        $item  = "id";
        $valor = $this->idCliente;

        $respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
ACTIVAR CLIENTE
=============================================*/

if (isset($_POST["activarCliente"])) {

    $activarPerfil                 = new AjaxCliente();
    $activarPerfil->activarCliente = $_POST["activarCliente"];
    $activarPerfil->activarId      = $_POST["activarId"];
    $activarPerfil->ajaxActivarCliente();

}

/*=============================================
EDITAR CLIENTE
=============================================*/
if (isset($_POST["idCliente"])) {

    $editar            = new AjaxCliente();
    $editar->idCliente = $_POST["idCliente"];
    $editar->ajaxEditarCliente();

}
