<?php

require_once "../controladores/otros.controlador.php";
require_once "../modelos/otros.modelo.php";

class AjaxOtros{


	/*=============================================
	EDITAR Otros
	=============================================*/	

	public $idOtros;

	public function ajaxEditarOtros(){

		$item = "id";
		$valor = $this->idOtros;

		$respuesta = ControladorOtros::ctrMostrarOtrosInfo($item, $valor);

		echo json_encode($respuesta);

	}



}


/*=============================================
EDITAR OTROS
=============================================*/
if(isset($_POST["idOtros"])){

	$editar = new AjaxOtros();
	$editar -> idOtros = $_POST["idOtros"];
	$editar -> ajaxEditarOtros();

}