<?php

require_once "../controladores/maquina.controlador.php";
require_once "../controladores/productos.controlador.php";
require_once "../modelos/maquina.modelo.php";
require_once "../modelos/productos.modelo.php";

class AjaxMaquina
{

    /*=============================================
    EDITAR MAQUINA
    =============================================*/

    public $idMaquina;

    public function ajaxEditarMaquina()
    {

        $item  = "id";
        $valor = $this->idMaquina;

        $respuesta = ControladorMaquina::ctrMostrarMaquinaInfo($item, $valor);

        echo json_encode($respuesta);

    }

    public $idProducto;

    public function ajaxEditarProductos()
    {

        $item  = "id_maquinas";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductosInfo($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR Maquina
=============================================*/
if (isset($_POST["idMaquina"])) {

    $editar            = new AjaxMaquina();
    $editar->idMaquina = $_POST["idMaquina"];
    $editar->ajaxEditarMaquina();

}

if (isset($_POST["idProducto"])) {

    $editar1            = new AjaxMaquina();
    $editar1->idMaquina = $_POST["idProducto"];
    $editar1->ajaxEditarProductos();

}
