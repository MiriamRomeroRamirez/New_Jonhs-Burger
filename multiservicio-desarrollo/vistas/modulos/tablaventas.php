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
                                    <li class="active">Tabla Ventas</li>
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
                                    <a href="vender" class="btn btn-primary btn-lg" role="button" aria-disabled="true"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Venta</a>
                                      </div>
                                    <div class="col-md-3">
                                        <a href="vistas/modulos/reportes.php?reporte=ventas">
                                    <button class="btn btn-success">Reporte en Excel</button></a>
                                  </div>

                              </div>

                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Ventas</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaVentas" id="tablaVentas">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Fecha</th>
                                            <th>Cod_Venta</th>
                                            <th>Clientes</th>
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
