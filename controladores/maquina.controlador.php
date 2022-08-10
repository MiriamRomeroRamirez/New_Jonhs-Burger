<?php

class ControladorMaquina
{

    public static function ctrMostrarMaquina($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquina($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarMaquinaInfo($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquinaInfo($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================S
REGISTRO DE NUEVO ADMINISTRADOR
=============================================*/

    public static function ctrCrearMaquina()
    {

        if (isset($_POST["nuevoTipo"])) {

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

                        $ruta = "vistas/img/maquina/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/maquina/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $fecha = date("Y-m-d H:i:s");
                $tabla = "maquinas";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "detalles"              => $_POST["nuevoDetalles"],
                    "especificaciones"      => $_POST["nuevoEspecificacion"],
                    "marca"                 => $_POST["nuevoMarca"],
                    "imagen"                => $ruta,
                    "id_tipomotor"          => $_POST["nuevoTipo"],
                    "fecha"                 => $fecha);

                $respuesta1 = ModeloMaquina::mdlIngresarMaquina($tabla, $datos);

                if ($respuesta1 == "ok") {

                    $item = "fecha";

                    $maquinas = ModeloMaquina::mdlMostrarMaquinaInfo($tabla, $item, $fecha);

                    $id_maquinas = (int) $maquinas["id"];

                    $id_repuestos = 0;
                    $id_otros     = 0;

                    $tabla1       = "productos";
                    $cantidad     = 0;
                    $precio       = 0;
                    $datosmaquina = array("id_otros" => $id_otros,
                        "id_maquinas"                    => $id_maquinas,
                        "precio"                         => $_POST["nuevoPrecio"],
                        "cantidad"                       => $_POST["nuevoCantidad"],
                        "clasificacion"                  => "maquinas",
                        "id_repuestos"                   => $id_repuestos,
                        "estado"                         => 1);

                    $respuesta2 = ModeloProductos::mdlIngresarProductos($tabla1, $datosmaquina);

                    if ($respuesta2 == "ok") {

                        echo '<script>

                                    swal({

                                        type: "success",
                                        title: "¡El Producto Maquina ha sido guardado correctamente!",
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
    EDITAR PERFIL
    =============================================*/

    public static function ctrEditarMaquina()
    {

        if (isset($_POST["idMaquina"])) {

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

                        $ruta = "vistas/img/maquina/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/maquina/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "maquinas";

                $datos = array("id" => $_POST["idMaquina"],
                    "nombre"            => $_POST["editarNombre"],
                    "detalles"          => $_POST["editarDetalles"],
                    "especificaciones"  => $_POST["editarEspecificacion"],
                    "marca"             => $_POST["editarMarca"],
                    "imagen"            => $ruta);
                //echo '<script>alert("everre");</script>';
                $respuesta = ModeloMaquina::mdlEditarMaquina($tabla, $datos);

                if ($respuesta == "ok") {
                    /* $item       = "id_maquinas";
                    $valor      = $_POST["idMaquina"];
                    $respuesta1 = ModeloProductos::mdlMostrarProductosInfo($tabla, $item, $valor);
                    $idproducto = $respuesta1["id"];
                    $datos1     = array("id" => $idproducto,
                    "cantidad"               => $_POST["editarCantidad"],
                    "precio"                 => $_POST["editarPrecio"]);

                    $editar = ModeloProductos::mdlEditarProductos($tabla, $datos1);*/

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El Maquina ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "maquinas";

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

                            window.location = "maquinas";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarMaquina()
    {

        if (isset($_GET["idMaquina"])) {

            $tabla1 = "maquinas";
            $tabla2 = "productos";
            $id     = $_GET["idMaquina"];

            if ($_GET["fotoMaquina"] != "") {

                unlink($_GET["fotoMaquina"]);

            }

            $respuesta = ModeloProductos::mdlEliminarProductos($tabla2, $id);
            ModeloMaquina::mdlEliminarMaquina($tabla1, $id);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El Maquinas ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "maquinas";

                                }
                            })

                </script>';

            }

        }

    }

}
