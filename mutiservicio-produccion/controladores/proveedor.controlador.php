<?php

class ControladorProveedor
{

    public static function ctrMostrarProveedor($item, $valor)
    {

        $tabla = "proveedor";

        $respuesta = ModeloProveedor::mdlMostrarProveedor($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarProveedorInfo($item, $valor)
    {

        $tabla = "proveedor";

        $respuesta = ModeloProveedor::mdlMostrarProveedorInfo($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================
REGISTRO DE NUEVO ADMINISTRADOR
=============================================*/

    public static function ctrCrearProveedor()
    {

        if (isset($_POST["nuevoTipo"])) {

            if ($_POST["nuevoNombre"] && $_POST["nuevoApellidos"]) {

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto  = 500;

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/proveedor/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/proveedor/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $cod_proveedor = "FR-" . strtoupper(substr($_POST["nuevoNombre"], 0, 1)) . rand(5, 10000);

                $tabla = "proveedor";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "apellidos"             => $_POST["nuevoApellidos"],
                    "documento"             => $_POST["nuevoDocumento"],
                    "telefono"              => $_POST["nuevoTelefono"],
                    "tipo_persona"          => $_POST["nuevoTipo"],
                    "tienda"                => $_POST["nuevoTienda"],
                    "direccion_web"         => $_POST["nuevoDireccion"],
                    "email"                 => $_POST["nuevoEmail"],
                    "cod_proveedor"         => $cod_proveedor,
                    "ruc"                   => $_POST["nuevoRuc"],
                    "foto"                  => $ruta,
                    "estado"                => 1);
                // echo '<script>alert("ever4");<script>';

                $respuesta = ModeloProveedor::mdlIngresarProveedor($tabla, $datos);
                // echo '<script>alert("ever5");<script>';

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El proveedor ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "proveedor";

						}

					});


					</script>';

                }

            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "proveedor";

						}

					});


				</script>';

            }

        }

    }

    /*=============================================
    EDITAR PERFIL
    =============================================*/

    public static function ctrEditarProveedor()
    {

        if (isset($_POST["idProveedor"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto  = 500;

                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/

                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);

                    } else {

                        mkdir($directorio, 0755);

                    }

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/proveedor/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/proveedor/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "proveedor";

                $datos = array("id" => $_POST["idProveedor"],
                    "nombre"            => $_POST["editarNombre"],
                    "apellidos"         => $_POST["editarApellidos"],
                    "documento"         => $_POST["editarDocumento"],
                    "telefono"          => $_POST["editarTelefono"],
                    "tipo_persona"      => $_POST["editarTipo"],
                    "email"             => $_POST["editarEmail"],
                    "tienda"            => $_POST["editarTienda"],
                    "ruc"               => $_POST["editarRuc"],
                    "direccion_web"     => $_POST["editarDireccion"],
                    "foto"              => $ruta);

                $respuesta = ModeloProveedor::mdlEditarProveedor($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "proveedor";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "proveedor";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    ELIMINAR PERFIL
    =============================================*/

    public static function ctrEliminarProveedor()
    {

        if (isset($_GET["idProveedor"])) {

            $tabla = "proveedor";
            $datos = $_GET["idProveedor"];

            if ($_GET["fotoProveedor"] != "") {

                unlink($_GET["fotoProveedor"]);

            }

            $respuesta = ModeloProveedor::mdlEliminarProveedor($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "proveedor";

								}
							})

				</script>';

            }

        }

    }

}
