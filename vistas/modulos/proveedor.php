
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
                                    <li class="active">Proveedor</li>
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
                                <div class="row">
                                  <div class="col-md-8">

                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
                                            Nuevo Proveedor
                                      </button>
                                  </div>
                                  <div class="col-md-3">
                                          <a href="vistas/modulos/reportes.php?reporte=proveedor">
                                      <button class="btn btn-success">Reporte en Excel</button></a>
                                  </div>
                                </div>


                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Proveedores</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaProveedor" id="tablaProveedor">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Nombres</th>
                                            <th>Foto</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Tienda</th>
                                            <th>Estado</th>
                                            <th>RUC</th>
                                            <th>Cod_Proveedor</th>
                                            <th>Tipo</th>
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
MODAL AGREGAR ADMINISTRADOR
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Agregar Proveedor</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

             <!-- ENTRADA PARA EL APELLIDOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoApellidos" name="nuevoApellidos" placeholder="Ingresar Apellidos" required>

              </div>

            </div>

             <!-- ENTRADA PARA DOCUMNETO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                <input type="number" class="form-control input-lg"  id="nuevoDocumento" name="nuevoDocumento" placeholder="Numero de documento" required>

              </div>

            </div>



             <!-- ENTRADA PARA TELEFONO  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono"  name="nuevoTelefono" placeholder="Ingresar Telefono" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar Email ( No es obligatorio)">

              </div>

            </div>

             <!-- ENTRADA PARA TIENDA VIRTUAL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-archive"></i></span>

                <input type="text" class="form-control input-lg"  id="nuevoTienda"  name="nuevoTienda" placeholder="Ingresar Nombre la Tienda " required>

              </div>

            </div>

             <!-- ENTRADA PARA DIRECCION  WEB-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg"  id="nuevoDireccion"  name="nuevoDireccion" placeholder="Ingresar Direccion Web (No es Obligatorio)">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-file"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoRuc" name="nuevoRuc" placeholder="Ingresar Ruc ( No es obligatorio)">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg"  id="nuevoTipo" name="nuevoTipo">

                  <option value="">Selecionar tipo de persona</option>

                  <option value="natural">Natural</option>

                  <option value="juridica">Juridica</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="form-control nuevaFoto"  id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/proveedor/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

        </div>

        <?php

$crearProveedor = new ControladorProveedor();
$crearProveedor->ctrCrearProveedor();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Editar Proveedor</h4><center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre" required>
                 <input type="hidden" id="idProveedor" name="idProveedor">

              </div>

            </div>

             <!-- ENTRADA PARA EL APELLIDOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <input type="text" class="form-control input-lg" id="editarApellidos" name="editarApellidos" placeholder="Ingresar Apellidos" required>

              </div>

            </div>

             <!-- ENTRADA PARA DOCUMNETO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                <input type="number" class="form-control input-lg" id="editarDocumento" name="editarDocumento" placeholder="Numero de documento" required>

              </div>

            </div>

             <!-- ENTRADA PARA TELEFONO  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" placeholder="Ingresar Telefono" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" placeholder="Ingresar Email" id="nuevoEmail" required>

              </div>

            </div>

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-archive"></i></span>

                <input type="text" class="form-control input-lg"  id="editarTienda"  name="editarTienda" placeholder="Ingresar Nombre la Tienda " required>

              </div>

            </div>

             <!-- ENTRADA PARA DIRECCION  WEB-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg"  id="editarDireccion"  name="editarDireccion" placeholder="Ingresar Direccion Web (No es Obligatorio)">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-file"></i></span>

                <input type="number" class="form-control input-lg" id="editarRuc" name="editarRuc" placeholder="Ingresar Ruc ( No es obligatorio)">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" id="editarTipo" name="editarTipo">

                  <option value="">Selecionar tipo de persona</option>

                  <option value="natural">Natural</option>

                  <option value="juridica">Juridica</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="form-control nuevaFoto" id="editarFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/proveedor/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Proveedor</button>

        </div>

     <?php

$editarProveedor = new ControladorProveedor();
$editarProveedor->ctrEditarProveedor();

?>

      </form>

    </div>

  </div>

</div>

<?php

$eliminarProveedor = new ControladorProveedor();
$eliminarProveedor->ctrEliminarProveedor();

?>
