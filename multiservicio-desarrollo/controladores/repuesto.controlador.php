<?php

class ControladorRepuesto
{

    public static function ctrMostrarRepuesto($item, $valor)
    {

        $tabla = "repuestos";

        $respuesta = ModeloRepuesto::mdlMostrarRepuesto($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarMaquinaInfo($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquinaId($tabla, $item, $valor);

        return $respuesta;
    }
    public static function ctrMostrarRepuestoInfo($item, $valor)
    {

        $tabla = "repuestos";

        $respuesta = ModeloRepuesto::mdlMostrarRepuestoInfo($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================S
REGISTRO DE NUEVO REPUESTO
=============================================*/

    public static function ctrCrearRepuesto()
    {

        if (isset($_POST["nuevoMaquina"])) {

            if ($_POST["nuevoNombre"] && $_POST["nuevoDetalles"]) {

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

                        $ruta = "vistas/img/repuesto/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/repuesto/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $fecha = date("Y-m-d H:i:s");
                $tabla = "repuestos";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "detalles"              => $_POST["nuevoDetalles"],
                    "especificaciones"      => $_POST["nuevoEspecificacion"],
                    "marca"                 => $_POST["nuevoMarca"],
                    "color"                 => $_POST["nuevoColor"],
                    "imagen"                => $ruta,
                    "id_maquinas"           => $_POST["nuevoMaquina"],
                    "fecha"                 => $fecha,
                );

                $respuesta1 = ModeloRepuesto::mdlIngresarRepuesto($tabla, $datos);

                if ($respuesta1 == "ok") {

                    $item = "fecha";

                    $repuestos = ModeloRepuesto::mdlMostrarRepuestoInfo($tabla, $item, $fecha);

                    $id_repuestos = (int) $repuestos["id"];

                    $id_maquinas = 0;
                    $id_otros    = 0;

                    $tabla1       = "productos";
                    $cantidad     = 0;
                    $precio       = 0;
                    $datosmaquina = array("precio" => $_POST["nuevoPrecio"],
                        "cantidad"                     => $_POST["nuevoCantidad"],
                        "id_otros"                     => $id_otros,
                        "id_maquinas"                  => $id_maquinas,
                        "id_repuestos"                 => $id_repuestos,
                        "clasificacion"                => "repuestos",
                        "estado"                       => 1);

                    $respuesta2 = ModeloProductos::mdlIngresarProductos($tabla1, $datosmaquina);

                    if ($respuesta2 == "ok") {

                        echo '<script>

                                    swal({

                                        type: "success",
                                        title: "¡El Producto Repuesto ha sido guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"

                                    }).then(function(result){

                                        if(result.value){

                                            window.location = "repuestos";

                                        }

                                    });


                                </script>';

                    }

                }

            } else {

                echo '<script>

                    swal({

                        type: "error",
                        title: "¡El Producto Maquina no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "maquinas";

                        }

                    });


                </script>';

            }

        }

    }

    /*=============================================
    EDITAR REPUESTO
    =============================================*/

    public static function ctrEditarRepuesto()
    {

        if (isset($_POST["idRepuesto"])) {

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

                        $ruta = "vistas/img/repuesto/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/repuesto/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "repuestos";

                $datos = array("id" => $_POST["idRepuesto"],
                    "nombre"            => $_POST["editarNombre"],
                    "detalles"          => $_POST["editarDetalles"],
                    "especificaciones"  => $_POST["editarEspecificacion"],
                    "marca"             => $_POST["editarMarca"],
                    "color"             => $_POST["editarColor"],
                    "id_maquinas"       => $_POST["editarMaquina"],
                    "imagen"            => $ruta);

                $respuesta = ModeloRepuesto::mdlEditarRepuesto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El Repuesto ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "repuestos";

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

                            window.location = "repuestos";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarRepuesto()
    {

        if (isset($_GET["idRepuesto"])) {

            $tabla1 = "repuestos";
            $tabla2 = "productos";
            $id     = $_GET["idRepuesto"];

            if ($_GET["fotoRepuesto"] != "") {

                unlink($_GET["fotoRepuesto"]);

            }

            $respuesta = ModeloRepuesto::mdlEliminarRepuesto($tabla2, $id);
            ModeloRepuesto::mdlEliminarRepuesto($tabla1, $id);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El Repuestos ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "repuestos";

                                }
                            })

                </script>';

            }

        }

    }

}
