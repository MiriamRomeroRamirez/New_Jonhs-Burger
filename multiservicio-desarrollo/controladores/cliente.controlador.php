<?php

class ControladorCliente
{

    public static function ctrMostrarTotalClientes($orden)
    {

        $tabla = "cliente";

        $respuesta = ModeloCliente::mdlMostrarTotalClientes($tabla, $orden);

        return $respuesta;

    }

    public static function ctrMostrarCliente($item, $valor)
    {

        $tabla = "cliente";

        $respuesta = ModeloCliente::MdlMostrarCliente($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarClienteInfo($item, $valor)
    {

        $tabla = "cliente";

        $respuesta = ModeloCliente::mdlMostrarClienteInfo($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================
REGISTRO DE NUEVO ADMINISTRADOR
=============================================*/

    public static function ctrCrearCliente()
    {

        if (isset($_POST["nuevoDireccion"])) {

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

                        $ruta = "vistas/img/cliente/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/cliente/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "cliente";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "apellidos"             => $_POST["nuevoApellidos"],
                    "documento"             => $_POST["nuevoDocumento"],
                    "direccion"             => $_POST["nuevoDireccion"],
                    "telefono"              => $_POST["nuevoTelefono"],
                    "estado"                => 1,
                    "foto"                  => $ruta,
                    "email"                 => $_POST["nuevoEmail"],
                    "departamento"          => $_POST["nuevoDepartamento"]);

                $respuesta = ModeloCliente::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({

                        type: "success",
                        title: "¡El Cliente ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "cliente";

                        }

                    });


                    </script>';

                }

            } else {

                echo '<script>

                    swal({

                        type: "error",
                        title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "cliente";

                        }

                    });


                </script>';

            }

        }

    }

    /*=============================================
    EDITAR PERFIL
    =============================================*/

    public static function ctrEditarCliente()
    {

        if (isset($_POST["idCliente"])) {

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

                        $ruta = "vistas/img/cliente/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/cliente/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "cliente";

                $datos = array("id" => $_POST["idCliente"],
                    "nombre"            => $_POST["editarNombre"],
                    "apellidos"         => $_POST["editarApellidos"],
                    "documento"         => $_POST["editarDocumento"],
                    "direccion"         => $_POST["editarDireccion"],
                    "telefono"          => $_POST["editarTelefono"],
                    "email"             => $_POST["nuevoEmail"],
                    "foto"              => $ruta,
                    "departamento"      => $_POST["editarDepartamento"]);

                $respuesta = ModeloCliente::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cliente ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "cliente";

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

                            window.location = "cliente";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarCliente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "cliente";
            $datos = $_GET["idCliente"];

            if ($_GET["fotoCliente"] != "") {

                unlink($_GET["fotoCliente"]);

            }

            $respuesta = ModeloCliente::mdlEliminarCliente($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El Cliente ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "cliente";

                                }
                            })

                </script>';

            }

        }

    }

}
