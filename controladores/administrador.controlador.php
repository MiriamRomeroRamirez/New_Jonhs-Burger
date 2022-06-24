<?php

class ControladorAdministrador
{

    /*=============================================
    INGRESO DE ADMINISTRADORES Y VERFICACION DE DATOS
    =============================================*/
    public function ctrIngresoAdministrador()
    {

        if (isset($_POST["ingemail"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingemail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingpassword"])) {

                $encriptar = crypt($_POST["ingpassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item  = "email";
                $valor = $_POST["ingemail"];

                $respuesta = ModeloAdministrador::mdlMostrarAdministrador($tabla, $item, $valor);

                if ($respuesta["email"] == $_POST["ingemail"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["validarSesionBackend"] = "ok";
                        $_SESSION["id"]                   = $respuesta["id"];
                        $_SESSION["nombre"]               = $respuesta["nombre"];
                        $_SESSION["foto"]                 = $respuesta["foto"];
                        $_SESSION["email"]                = $respuesta["email"];
                        $_SESSION["password"]             = $respuesta["password"];
                        $_SESSION["perfil"]               = $respuesta["perfil"];

                        echo '<script>

                            window.location = "inicio";

                        </script>';

                    } else {

                        echo '<br>
                        <div class="alert alert-warning">Este usuario aún no está activado</div>';

                    }

                } else {

                    echo '<br>
                    <div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';

                }

            }

        }

    }

    /*=============================================
    MOSTRAR ADMINISTRADORES
    =============================================*/

    public static function ctrMostrarAdministrador($item, $valor)
    {

        $tabla = "administradores";

        $respuesta = ModeloAdministrador::MdlMostrarAdministrador($tabla, $item, $valor);

        return $respuesta;
    }

/*=============================================
REGISTRO DE NUEVO ADMINISTRADOR
=============================================*/

    public static function ctrCrearPerfil()
    {

        if (isset($_POST["nuevoPerfil"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

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

                        $ruta = "vistas/img/perfiles/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/perfiles/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "administradores";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "email"                 => $_POST["nuevoEmail"],
                    "password"              => $encriptar,
                    "perfil"                => $_POST["nuevoPerfil"],
                    "foto"                  => $ruta,
                    "estado"                => 1);

                $respuesta = ModeloAdministrador::mdlIngresarPerfil($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({

                        type: "success",
                        title: "¡El perfil ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "administrador";

                        }

                    });


                    </script>';

                }

            } else {

                echo '<script>

                    swal({

                        type: "error",
                        title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){

                            window.location = "perfiles";

                        }

                    });


                </script>';

            }

        }

    }

    /*=============================================
    EDITAR PERFIL
    =============================================*/

    public static function ctrEditarPerfil()
    {

        if (isset($_POST["idPerfil"])) {

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

                        $ruta = "vistas/img/perfiles/" . $aleatorio . ".jpg";

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

                        $ruta = "vistas/img/perfiles/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "administradores";

                if ($_POST["editarPassword"] != "") {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    } else {

                        echo '<script>

                                swal({
                                      type: "error",
                                      title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then(function(result) {
                                        if (result.value) {

                                        window.location = "administrador";

                                        }
                                    })

                            </script>';

                    }

                } else {

                    $encriptar = $_POST["passwordActual"];

                }

                $datos = array("id" => $_POST["idPerfil"],
                    "nombre"            => $_POST["editarNombre"],
                    "email"             => $_POST["editarEmail"],
                    "password"          => $encriptar,
                    "perfil"            => $_POST["editarPerfil"],
                    "foto"              => $ruta);

                $respuesta = ModeloAdministrador::mdlEditarPerfil($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El perfil ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "administrador";

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

                            window.location = "administrador";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR PERFIL
    =============================================*/

    public static function ctrEliminarPerfil()
    {

        if (isset($_GET["idPerfil"])) {

            $tabla = "administradores";
            $datos = $_GET["idPerfil"];

            if ($_GET["fotoPerfil"] != "") {

                unlink($_GET["fotoPerfil"]);

            }

            $respuesta = ModeloAdministrador::mdlEliminarPerfil($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El perfil ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "administrador";

                                }
                            })

                </script>';

            }

        }

    }

/*=============================================
OLVIDO DE CONTRASEÑA
=============================================*/

    public function ctrOlvidoPassword()
    {

        if (isset($_POST["passEmail"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])) {

                /*=============================================
                GENERAR CONTRASEÑA ALEATORIA
                =============================================*/

                function generarPassword($longitud)
                {

                    $key     = "";
                    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

                    $max = strlen($pattern) - 1;

                    for ($i = 0; $i < $longitud; $i++) {

                        $key .= $pattern{mt_rand(0, $max)};

                    }

                    return $key;

                }

                $nuevaPassword = generarPassword(11);

                $encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";

                $item1  = "email";
                $valor1 = $_POST["passEmail"];

                $respuesta1 = ModeloAdministrador::mdlMostrarAdministrador($tabla, $item1, $valor1);

                if ($respuesta1) {

                    $id     = $respuesta1["id"];
                    $item2  = "password";
                    $valor2 = $encriptar;

                    $respuesta2 = ModeloAdministrador::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

                    if ($respuesta2 == "ok") {

                        /*=============================================
                        CAMBIO DE CONTRASEÑA
                        =============================================*/

                        date_default_timezone_set("America/Bogota");

                        $url = Ruta::ctrRuta();

                        $mail = new PHPMailer;

                        $mail->CharSet = 'UTF-8';

                        $mail->isMail();

                        $mail->setFrom('usuarios@sumaktec.com', 'SUMAKTEC');

                        $mail->addReplyTo('usuarios@sumaktec.com', 'SUMAKTEC');

                        $mail->Subject = "Solicitud de nueva contraseña";

                        $mail->addAddress($_POST["passEmail"]);

                        $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                                 <br>
                                 <br>

                                <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                                <center>

                                    <img style="padding:20px; width:65%" src="https://www.mecanica.sumaktec.com/vistas/img/plantilla/logo.jpg">

                                </center>

                                    <center>



                                    <h3 style="font-weight:100; color:#E50039">SOLICITUD DE NUEVA CONTRASEÑA</h3>

                                    <hr style="border:1px solid #ccc; width:80%">

                                    <h4 style="font-weight:100; color:#E50039; padding:0 20px"><strong>Su nueva contraseña: </strong>' . $nuevaPassword . '</h4>

                                    <a href="' . $url . '" target="_blank" style="text-decoration:none">

                                    <div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

                                    </a>

                                    <br>

                                    <hr style="border:1px solid #E50039; width:80%">

                                    <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

                                    </center>

                                </div>

                            </div>');

                        $envio = $mail->Send();

                        if (!$envio) {

                            echo '<script>

                                swal({
                                      title: "¡ERROR!",
                                      text: "¡Ha ocurrido un problema enviando cambio de contraseña a ' . $_POST["passEmail"] . $mail->ErrorInfo . '!",
                                      type:"error",
                                      confirmButtonText: "Cerrar",
                                      closeOnConfirm: false
                                    },

                                    function(isConfirm){

                                        if(isConfirm){
                                            history.back();
                                        }
                                });

                            </script>';

                        } else {

                            echo '<script>

                                swal({
                                      title: "¡OK!",
                                      text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["passEmail"] . ' para su cambio de contraseña!",
                                      type:"success",
                                      confirmButtonText: "Cerrar",
                                      closeOnConfirm: false
                                    },

                                    function(isConfirm){

                                        if(isConfirm){
                                            history.back();
                                        }
                                });

                            </script>';

                        }

                    }

                } else {

                    echo '<script>

                        swal({
                              title: "¡ERROR!",
                              text: "¡El correo electrónico no existe en el sistema!",
                              type:"error",
                              confirmButtonText: "Cerrar",
                              closeOnConfirm: false
                            },

                            function(isConfirm){

                                if(isConfirm){
                                    history.back();
                                }
                        });

                    </script>';

                }

            } else {

                echo '<script>

                        swal({
                              title: "¡ERROR!",
                              text: "¡Error al enviar el correo electrónico, está mal escrito!",
                              type:"error",
                              confirmButtonText: "Cerrar",
                              closeOnConfirm: false
                            },

                            function(isConfirm){

                                if(isConfirm){
                                    history.back();
                                }
                        });

                </script>';

            }

        }

    }

}
