<?php

class ControladorOtros
{

    public static function ctrMostrarOtros($item, $valor)
    {

        $tabla = "otros";

        $respuesta = ModeloOtros::mdlMostrarOtros($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarOtrosInfo($item, $valor)
    {

        $tabla = "otros";

        $respuesta = ModeloOtros::mdlMostrarOtrosInfo($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================S
REGISTRO DE NUEVO OTROS
=============================================*/

    public static function ctrCrearOtros()
    {

        if (isset($_POST["nuevoModelo"])) {

            if ($_POST["nuevoNombre"] && $_POST["nuevoModelo"]) {

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

                        $ruta = "vistas/img/otros/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/otros/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $fecha = date("Y-m-d H:i:s");
                $tabla = "otros";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "modelo"                => $_POST["nuevoModelo"],
                    "especificaciones"      => $_POST["nuevoEspecificacion"],
                    "marca"                 => $_POST["nuevoMarca"],
                    "imagen"                => $ruta,
                    "color"                 => $_POST["nuevoColor"],
                    "tamano"                => $_POST["nuevoTamano"],
                    "fecha"                 => $fecha);

                $respuesta1 = ModeloOtros::mdlIngresarOtros($tabla, $datos);

                if ($respuesta1 == "ok") {

                    $item = "fecha";

                    $otros = ModeloOtros::mdlMostrarOtrosInfo($tabla, $item, $fecha);

                    $id_otros = (int) $otros["id"];

                    $id_repuestos = 0;
                    $id_maquinas  = 0;

                    $tabla1 = "productos";

                    $datosmaquina = array("cantidad" => $_POST["nuevoCantidad"], "precio" => $_POST["nuevoPrecio"], "id_otros" => $id_otros, "id_maquinas" => $id_maquinas, "id_repuestos" => $id_repuestos, "clasificacion" => "otros", "estado" => 1);

                    $respuesta2 = ModeloProductos::mdlIngresarProductos($tabla1, $datosmaquina);

                    if ($respuesta2 == "ok") {

                        echo '<script>

                                    swal({

                                        type: "success",
                                        title: "¡El Otros Producto  ha sido guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"

                                    }).then(function(result){

                                        if(result.value){

                                            window.location = "otros";

                                        }

                                    });


                                </script>';

                    }

                }

            } else {

                echo '<script>

                    swal({

                        type: "error",
                        title: "¡El Otros Producto  no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "otros";

                        }

                    });


                </script>';

            }

        }

    }

    /*=============================================
    EDITAR OTROS
    =============================================*/

    public static function ctrEditarOtros()
    {

        if (isset($_POST["idOtros"])) {

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

                        $ruta = "vistas/img/otros/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/otros/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "otros";

                $datos = array("id" => $_POST["idOtros"],
                    "nombre"            => $_POST["editarNombre"],
                    "modelo"            => $_POST["editarModelo"],
                    "especificaciones"  => $_POST["editarEspecificacion"],
                    "marca"             => $_POST["editarMarca"],
                    "color"             => $_POST["editarColor"],
                    "tamano"            => $_POST["editarTamano"],
                    "imagen"            => $ruta);

                $respuesta = ModeloOtros::mdlEditarOtros($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El Otros ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "otros";

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

                            window.location = "otros";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR OTROS
    =============================================*/

    public static function ctrEliminarOtros()
    {

        if (isset($_GET["idOtros"])) {

            $tabla1 = "otros";
            $tabla2 = "productos";
            $id     = $_GET["idOtros"];

            if ($_GET["fotoOtros"] != "") {

                unlink($_GET["fotoOtros"]);

            }

            $respuesta = ModeloOtros::mdlEliminarOtros($tabla2, $id);
            ModeloProductos::mdlEliminarProductos($tabla1, $id);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El Otros Productos ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "otros";

                                }
                            })

                </script>';

            }

        }

    }

}
