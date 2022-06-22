<?php

require_once "../controladores/empleado.controlador.php";
require_once "../modelos/empleado.modelo.php";

class AjaxEmpleado{

	/*=============================================
	ACTIVAR EMPLEADO
	=============================================*/	

	public $activarEmpleado;
	public $activarId;

	public function ajaxActivarEmpleado(){

		$tabla = "empleado";

		$item1 = "estado";
		$valor1 = $this->activarEmpleado;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloEmpleado::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/	

	public $idEmpleado;

	public function ajaxEditarEmpleado(){

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = ControladorEmpleado::ctrMostrarEmpleado($item, $valor);

		echo json_encode($respuesta);

	}



}

/*=============================================
ACTIVAR EMPLEADO
=============================================*/	

if(isset($_POST["activarEmpleado"])){

	$activarPerfil = new AjaxEmpleado();
	$activarPerfil -> activarEmpleado = $_POST["activarEmpleado"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarEmpleado();

}

/*=============================================
EDITAR EMPLEADO
=============================================*/
if(isset($_POST["idEmpleado"])){

	$editar = new AjaxEmpleado();
	$editar -> idEmpleado = $_POST["idEmpleado"];
	$editar -> ajaxEditarEmpleado();

}