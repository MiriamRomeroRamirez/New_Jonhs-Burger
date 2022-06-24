<?php

require_once "../controladores/repuesto.controlador.php";
require_once "../modelos/repuesto.modelo.php";

class AjaxRepuesto{


	/*=============================================
	EDITAR REPUESTO
	=============================================*/	

	public $idRepuesto;

	public function ajaxEditarRepuesto(){

		$item = "id";
		$valor = $this->idRepuesto;

		$respuesta = ControladorRepuesto::ctrMostrarRepuestoInfo($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR REPUESTO
=============================================*/
if(isset($_POST["idRepuesto"])){

	$editar = new AjaxRepuesto();
	$editar -> idRepuesto = $_POST["idRepuesto"];
	$editar -> ajaxEditarRepuesto();

}