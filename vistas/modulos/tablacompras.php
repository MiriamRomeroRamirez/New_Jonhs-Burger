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
                                    <li class="active">Tabla Compras</li>
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
                                  <div class="col-md-9">
                                    <a href="comprar" class="btn btn-primary btn-lg" role="button" aria-disabled="true"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Compra</a>
                                      </div>
                                    <div class="col-md-3">
                                        <a href="vistas/modulos/reportes.php?reporte=compras">
                                    <button class="btn btn-success">Reporte en Excel</button></a>
                                  </div>

                              </div>
                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Compras</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaCompras" id="tablaCompras">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Fecha</th>
                                            <th>Cod_Compra</th>
                                            <th>Proveedor</th>
                                            <th>Comprobante</th>
                                            <th>Nro_Documento</th>
                                            <th>Total</th>
                                            <th>Estado</th>

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
MODAL EDITAR COMPRA
======================================-->

<div id="modalEditarCompra" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Editar Compra</h4><center>

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
                  <input type="hidden" id="idCompra" name="idCompra">

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

          <button type="submit" class="btn btn-primary">Modificar Compras</button>

        </div>

     <?php

//$editarCompras = new ControladorCompras();
//$editarCompras -> ctrEditarCompras();

?>

      </form>

    </div>

  </div>

</div>

<?php

//$eliminarcompras = new ControladorCompras();
//$eliminarcompras -> ctrEliminarCompras();

?>