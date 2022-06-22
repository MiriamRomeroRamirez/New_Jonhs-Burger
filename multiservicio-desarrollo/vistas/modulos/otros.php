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
                                    <li class="active">Otros</li>
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


                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOtros">
                                          Nuevo Otros
                                    </button>
                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Otros</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaOtros" id="tablaOtros">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Nombres</th>
                                            <th>Modelo</th>
                                            <th>Especificacion</th>
                                            <th>Imagen</th>
                                            <th>Marca</th>
                                            <th>Color</th>
                                            <th>Tamaño</th>
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
MODAL AGREGAR OTROS
======================================-->

<div id="modalAgregarOtros" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Agregar Otros</h4></center>

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

             <!-- ENTRADA PARA MODELO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoModelo" name="nuevoModelo" placeholder="Ingresar Modelo" required>

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

             <!-- ENTRADA PARA COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoColor"  name="nuevoColor" placeholder="Ingresar Color" required>

              </div>

            </div>

             <!-- ENTRADA PARA TAMAÑO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTamano"  name="nuevoTamano" placeholder="Ingresar Tamaño" required>

              </div>

            </div>





            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="form-control nuevaFoto"  id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/maquina/default/default.jpg" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

          <hr>

            <!-- PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"> S./ </span>

                <input type="number" class="form-control input-lg" id="nuevoPrecio"  name="nuevoPrecio" pattern="^\d*(\.\d{0,2})?$"  placeholder="Precio(Opcional)" >

              </div>

            </div>


            <!-- ENTRADA PARA EL Cantidad-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoCantidad" name="nuevoCantidad"  placeholder="Cantidad(Opcional)"  >

              </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Otros</button>

        </div>

        <?php

$crearotros = new ControladorOtros();
$crearotros->ctrCrearOtros();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MAQUINA
======================================-->

<div id="modalEditarOtros" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Editar Otros</h4><center>

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

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre" required>
                 <input type="hidden" id="idOtros" name="idOtros">

              </div>

            </div>

             <!-- ENTRADA PARA MODELO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" id="editarModelo" name="editarModelo" placeholder="Ingresar Modelo" required>

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

             <!-- ENTRADA PARA COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="editarColor"  name="editarColor" placeholder="Ingresar Color" required>

              </div>

            </div>

             <!-- ENTRADA PARA TAMAÑO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>

                <input type="text" class="form-control input-lg" id="editarTamano"  name="editarTamano" placeholder="Ingresar Tamaño" required>

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

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Otros</button>

        </div>

     <?php

$editarOtros = new ControladorOtros();
$editarOtros->ctrEditarOtros();

?>

      </form>

    </div>

  </div>

</div>

<?php

$eliminarOtros = new ControladorOtros();
$eliminarOtros->ctrEliminarOtros();

?>