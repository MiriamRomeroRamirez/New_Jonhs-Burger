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
                                    <li class="active">Inventario</li>
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
                                </div>
                                <div class="col-md-3">
                                    <a href="vistas/modulos/reportes.php?reporte=productos">
                                          <button class="btn btn-success">Reporte en Excel</button></a>
                                </div>
                            </div>

                              <div class="col-md-10">
                                <center><strong class="card-title">Control de Inventario Productos</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaProductos" id="tablaProductos">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Clasificacion</th>
                                            <th>Nombres</th>
                                            <th>Imagen</th>
                                            <th>Marca</th>
                                            <th>Precio S/</th>
                                            <th>Stock</th>
                                            <th>Estado</th>
                                            <th>Cantidad Vendidos</th>
                                            <th>Fecha Modificacion</th>
                                            <th>Control</th>
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
MODAL EDITAR CANTIDAD Y PRECIO
======================================-->

<div id="modalEditarProductos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">EDITAR CANTIDAD Y PRECIO</h4><center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">



            <input type="hidden" id="idProducto" name="idProducto">


            <!-- PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"> S./ </span>

                <input type="number" class="form-control input-lg" id="editarPrecio"  name="editarPrecio" pattern="^\d*(\.\d{0,2})?$"  placeholder="Precio" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL Cantidad-->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

                <input type="number" class="form-control input-lg" id="editarCantidad" name="editarCantidad"  placeholder="Cantidad"  required>

              </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Productos</button>

        </div>

     <?php

$editarProductos = new ControladorProductos();
$editarProductos->ctrEditarProductos();

?>

      </form>

    </div>

  </div>

</div>

