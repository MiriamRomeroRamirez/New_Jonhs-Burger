<?php

class ControladorEmpleado{
	
	
	static public function ctrMostrarEmpleado($item, $valor){

		$tabla = "empleado";

		$respuesta = ModeloEmpleado::MdlMostrarEmpleado($tabla, $item, $valor);

		return $respuesta;
	}


/*=============================================
	REGISTRO DE NUEVO ADMINISTRADOR
	=============================================*/

	static public function ctrCrearEmpleado(){

		  if(isset($_POST["nuevoCargo"])){
		

			if( $_POST["nuevoNombre"] && $_POST["nuevoApellidos"] ){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/
				

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empleado/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empleado/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "empleado";
				

				$datos = array("nombre" => $_POST["nuevoNombre"],
					            "apellidos" => $_POST["nuevoApellidos"],
					            "documento" => $_POST["nuevoDocumento"],
					            "direccion" => $_POST["nuevoDireccion"], 
					            "telefono" => $_POST["nuevoTelefono"],
					            "cargo" => $_POST["nuevoCargo"],     
					            "estado" => 1, 
					            "email" => $_POST["nuevoEmail"],
					            "foto"=>$ruta
					            );
            
				$respuesta = ModeloEmpleado::mdlIngresarEmpleado($tabla, $datos);
         
			   
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El empleado ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empleado";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El empleado no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empleado";

						}

					});
				

				</script>';

			}

		}
		


	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditarEmpleado(){
     
		if(isset($_POST["idEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empleado/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empleado/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "empleado";


				$datos = array("id" => $_POST["idEmpleado"],
							   "nombre" => $_POST["editarNombre"],
					            "apellidos" => $_POST["editarApellidos"],
					            "documento" => $_POST["editarDocumento"],
					            "telefono" => $_POST["editarTelefono"],
					            "cargo" => $_POST["editarCargo"],
					            "email" => $_POST["editarEmail"],
					            "direccion" => $_POST["editarDireccion"],		      
					            "foto"=>$ruta);

				$respuesta = ModeloEmpleado::mdlEditarEmpleado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Empleado ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "empleado";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "empleado";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrEliminarEmpleado(){
 
		
		if(isset($_GET["idProveedor"])){
     
  			
			$tabla ="proveedor";
			$datos = $_GET["idProveedor"];

			if($_GET["fotoProveedor"] != ""){

				unlink($_GET["fotoProveedor"]);
			
			}
          
			$respuesta = ModeloEmpleado::mdlEliminarEmpleadp($tabla, $datos);
			

			if($respuesta == "ok"){
              
				
				echo'<script>

				swal({
					  type: "success",
					  title: "El proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "empleado";

								}
							})

				</script>';

				

			}		

		}

	}

}
