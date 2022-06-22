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
                                    <li class="active">Repuestos</li>
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


                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRepuestos">
                                          Nuevo Repuestos
                                    </button>
                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Repuestos</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaRepuesto" id="tablaRepuesto">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Nombres</th>
                                            <th>Detalles</th>
                                            <th>Especificacion</th>
                                            <th>Imagen</th>
                                            <th>Marca</th>
                                            <th>Color</th>
                                            <th>Maquina</th>
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

<div id="modalAgregarRepuestos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Agregar Repuestos</h4></center>

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

             <!-- ENTRADA PARA COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoColor"  name="nuevoColor" placeholder="Ingresar Color" required>

              </div>

            </div>



            <!-- ENTRADA PARA SELECCIONAR  MAQUINA --->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sliders"></i></span>

                <select class="form-control input-lg"  id="nuevoMaquina" name="nuevoMaquina">

                   <option value="">Selecionar Maquina</option>

                    <?php

$item  = null;
$valor = null;

$tipo = ControladorMaquina::ctrMostrarMaquina($item, $valor);

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

                <input type="number" class="form-control input-lg" id="nuevoCantidad" name="nuevoCantidad"  placeholder="Cantidad"  >

              </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Repuesto</button>

        </div>

        <?php

$crearRepuesto = new ControladorRepuesto();
$crearRepuesto->ctrCrearRepuesto();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MAQUINA
======================================-->

<div id="modalEditarRepuesto" class="modal fade" role="dialog">

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
                  <input type="hidden" id="idRepuesto" name="idRepuesto">

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

             <!-- ENTRADA PARA COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plug"></i></span>

                <input type="text" class="form-control input-lg" id="editarColor"  name="editarColor" placeholder="Ingresar Amperios" required>

              </div>

            </div>




            <!-- ENTRADA PARA SELECCIONAR SU MAQUINAS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort"></i></span>

                <select class="form-control input-lg"  id="editarMaquina" name="editarMaquina">

                   <option value="">Selecionar Maquinas</option>

                    <?php

$item  = null;
$valor = null;

$tipo = ControladorMaquina::ctrMostrarMaquina($item, $valor);

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

          <button type="submit" class="btn btn-primary">Modificar Repuestos</button>

        </div>

     <?php

$editarRepuesto = new ControladorRepuesto();
$editarRepuesto->ctrEditarRepuesto();

?>

      </form>

    </div>

  </div>

</div>

<?php

$eliminarRepuesto = new ControladorRepuesto();
$eliminarRepuesto->ctrEliminarRepuesto();

?>