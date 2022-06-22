<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Inicio</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="inicio">Inicio</a></li>
                                    <!--<li><a href="#">Table</a></li>-->
                                    <li class="active">Maquinas</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>


 <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">


                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaquina">
                                          Nuevo Maquinas
                                    </button>


                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Maquinas</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaMaquina" id="tablaMaquina">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Nombres</th>
                                            <th>Detalles</th>
                                            <th>Imagen</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Amperios</th>
                                            <th>Tamaño</th>
                                            <th>Watts</th>
                                            <th>Hp</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
</div><!-- .content -->

<!--=====================================
MODAL AGREGAR MAQUINA
======================================-->

<div id="modalAgregarMaquina" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Agregar Maquinas</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

             <!-- ENTRADA PARA DETALLES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoDetalles" name="nuevoDetalles" placeholder="Ingresar Detalles" required>

              </div>

            </div>

             <!-- ENTRADA PARA ESPECIFICACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-indent"></i></span>

                <input type="text" class="form-control input-lg"  id="nuevoEspecificacion" name="nuevoEspecificacion" placeholder="Especificacion" required>

              </div>

            </div>

             <!-- ENTRADA PARA MARCA  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>

                <input type="text" class="form-control input-lg"  id="nuevoMarca"  name="nuevoMarca" placeholder="Ingresar Marca" required>

              </div>

            </div>

             <!-- ENTRADA PARA AMPERIOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoAmperios"  name="nuevoAmperios" placeholder="Ingresar Amperios" required>

              </div>

            </div>

             <!-- ENTRADA PARA TAMAÑO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTamano"  name="nuevoTamano" placeholder="Ingresar Tamaño" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL WATTS-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bolt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoWatts" name="nuevoWatts" placeholder="Ingresar Watts"  required>

              </div>

            </div>


            <!-- ENTRADA PARA EL HP-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoHp" name="nuevoHp" placeholder="Ingresar Hp"  required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU TIPO MOTOR-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sliders"></i></span>

                <select class="form-control input-lg"  id="nuevoTipo" name="nuevoTipo">

                   <option value="">Selecionar TipoMotor</option>

                    <?php

$item  = null;
$valor = null;

$tipo = ControladorTipoMotor::ctrMostrarTipoMotor($item, $valor);

foreach ($tipo as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
}

?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="form-control nuevaFoto"  id="nuevaFoto" name="nuevaFoto">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="vistas/img/maquina/default/default.jpg" class="img-thumbnail previsualizar" width="100px">

            </div>

            <hr>

            <!-- PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"> S./ </span>

                <input type="number" class="form-control input-lg" id="nuevoPrecio"  name="nuevoPrecio" pattern="^\d*(\.\d{0,2})?$"  placeholder="Precio" >

              </div>

            </div>


            <!-- ENTRADA PARA EL Cantidad-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoCantidad" name="nuevoCantidad"  placeholder="Cantidad">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Maquina</button>

        </div>

        <?php

$crearMaquina = new ControladorMaquina();
$crearMaquina->ctrCrearMaquina();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MAQUINA
======================================-->

<div id="modalEditarMaquina" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Editar Maquina</h4><center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


           <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre" required>
                  <input type="hidden" id="idMaquina" name="idMaquina">

              </div>

            </div>

             <!-- ENTRADA PARA EL DETALLES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" id="editarDetalles" name="editarDetalles" placeholder="Ingresar Detalles" required>

              </div>

            </div>

             <!-- ENTRADA PARA ESPECIFICACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-indent"></i></span>

                <input type="text" class="form-control input-lg"  id="editarEspecificacion" name="editarEspecificacion" placeholder="Especificacion" required>

              </div>

            </div>

             <!-- ENTRADA PARA MARCA  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>

                <input type="text" class="form-control input-lg"  id="editarMarca"  name="editarMarca" placeholder="Ingresar Marca" required>

              </div>

            </div>

             <!-- ENTRADA PARA AMPERIOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="editarAmperios"  name="editarAmperios" placeholder="Ingresar Amperios" required>

              </div>

            </div>

             <!-- ENTRADA PARA TAMAÑO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>

                <input type="text" class="form-control input-lg" id="editarTamano"  name="editarTamano" placeholder="Ingresar Tamaño" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL WATTS-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bolt"></i></span>

                <input type="text" class="form-control input-lg" id="editarWatts" name="editarWatts" placeholder="Ingresar Watts"  required>

              </div>

            </div>


            <!-- ENTRADA PARA EL HP-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span>

                <input type="text" class="form-control input-lg" id="editarHp" name="editarHp" placeholder="Ingresar Hp"  required>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU TIPO MOTOR-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg"  id="editarTipo" name="editarTipo">

                   <option value="">Selecionar TipoMotor</option>

                    <?php

$item  = null;
$valor = null;

$tipo = ControladorTipoMotor::ctrMostrarTipoMotor($item, $valor);

foreach ($tipo as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
}

?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="form-control nuevaFoto" id="editarFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/maquina/default/default.jpg" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>


        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Maquinas</button>

        </div>

     <?php

$editarMaquina = new ControladorMaquina();
$editarMaquina->ctrEditarMaquina();

?>

      </form>

    </div>

  </div>

</div>

<?php

$eliminarMaquina = new ControladorMaquina();
$eliminarMaquina->ctrEliminarMaquina();

?>