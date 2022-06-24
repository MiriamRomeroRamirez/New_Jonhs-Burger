<?php

class ControladorTipoMotor{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarTipoMotor($item, $valor){

		$tabla = "tipo_motor";

		$respuesta = ModeloMaquina::mdlMostrarTipoMotor($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarTipo($item, $valor){

		$tabla = "tipo_motor";

		$respuesta = ModeloMaquina::mdlMostrarTipo($tabla, $item, $valor);

		return $respuesta;

	}

}