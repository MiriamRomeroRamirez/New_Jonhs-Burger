<?php

class ControladorProductos
{

    public static function ctrMostrarTotalProductos($orden)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);

        return $respuesta;

    }

    public static function ctrMostrarProductos($item, $valor)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarProductosInfo($item, $valor)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductosInfo($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarMaquina($item, $valor)
    {

        $tabla = "maquinas";

        $respuesta = ModeloMaquina::mdlMostrarMaquina($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarRepuesto($item, $valor)
    {

        $tabla = "repuestos";

        $respuesta = ModeloRepuesto::mdlMostrarRepuesto($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrMostrarOtros($item, $valor)
    {

        $tabla = "otros";

        $respuesta = ModeloOtros::mdlMostrarOtros($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    LISTAR PRODUCTOS
    =============================================*/

    public static function ctrListarProductos($ordenar, $item, $valor)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    ACTUALIZAR VISTA PRODUCTO
    =============================================*/

    public static function ctrActualizarProducto($item1, $valor1, $item2, $valor2, $item3, $valor3)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

        return $respuesta;
    }

    public static function ctrEditarProductos()
    {

        if (isset($_POST["idProducto"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPrecio"])) {

                $tabla = "productos";

                $datos = array("id" => $_POST["idProducto"],
                    "cantidad"          => $_POST["editarCantidad"],
                    "precio"            => $_POST["editarPrecio"]);

                $respuesta = ModeloProductos::mdlEditarProductos($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "La Cantidad / Precio ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "productos";

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

}
