 <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="vistas/img/plantilla/logo.jpg" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="ingemail" name="ingemail" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="ingpassword" name="ingpassword" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recordarmelo
                            </label>
                            <label class="pull-right">
                                <a href="#modalPassword" data-dismiss="modal" data-toggle="modal">Olvidastes tu password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ingresar</button>
                         <?php

$login = new ControladorAdministrador();
$login->ctrIngresoAdministrador();

?>
                    </form>
                </div>
            </div>
        </div>
    </div>



<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h4>



            <!--=====================================
            OLVIDO CONTRASEÑA
            ======================================-->

            <form method="post">

                <label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="fa fa-paper-plane"></i>

                        </span>

                        <input type="email" class="form-control input-lg" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

                    </div>

                </div>

                <?php

$password = new ControladorAdministrador();
$password->ctrOlvidoPassword();

?>

                <input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

            </form>

        </div>

        <div class="modal-footer">

            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>

    </div>

</div>
