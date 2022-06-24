
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
                                    <li class="active">Nueva Venta</li>
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
                              <div class="col-md-2">
                                <a href="cliente" class="btn btn-primary btn-lg" role="button" aria-disabled="true"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Cliente</a>
                              </div>

                              <div class="col-md-9">
                                  <center><strong class="card-title">REALIZAR VENTA</strong></center>
                              </div>
                            </div>

                          </div>
                          <div class="card-body">
                            <div class="row">


                        <!-- ENTRADA PARA SELECCIONAR  CLIENTE --->
                             <div class="col-md-8 col-xs-12">
                              <div class="form-group">

                                <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                  <select class="form-control input-lg"  id="productoCliente" name="productoCliente">

                                     <option value="">Selecionar Cliente</option>

                                          <?php

$item  = null;
$valor = null;

$tipo = ControladorCliente::ctrMostrarCliente($item, $valor);

foreach ($tipo as $key => $value) {
    if ($value["estado"] == 1) {

        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . ' ' . $value["apellidos"] . '</option>';
    }
}

?>

                                  </select>

                                </div>

                              </div>


                                     <!-- ENTRADA PARA SELECCIONAR COMPROBANTE -->

                              <div class="form-group">

                                <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-sliders"></i></span>

                                  <select class="form-control input-lg" id="productoComprobante" name="editarComprobante">

                                    <option value="">Selecionar tipo Comprobante</option>
                                    <option value="factura">Factura</option>
                                    <option value="boleta">Boleta</option>
                                    <option value="ticket">Ticket</option>
                                  </select>

                                </div>

                              </div>


                          </div>

                        <div class="col-md-4 col-xs-12">

                          <div class="form-group row">

                             <div class="col-md-4 col-xs-12">
                              <div class="input-group">



                                  <input type="number" class="form-control input-lg" id="productoSerie"  name="productoSerie" value="FR0-" placeholder="FR0 -" readonly="">

                              </div>
                            </div>
                            <div class="col-md-8 col-xs-12">
                              <div class="input-group">

                                  <span class="input-group-addon">Nro Docu:</i></span>

                                  <input type="number" class="form-control input-lg productoDocumento" id="productoDocumento"  name="productoDocumento" >

                              </div>
                            </div>

                           </div>

                           <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon">Impuesto:</span>

                                  <input type="text" class="form-control input-lg productoImpuesto" id="productoImpuesto"  name="nuevoColor" placeholder=" IGV(Opcional)" >

                              </div>

                           </div>

                        </div>

                        <div class="col-md-10">
                                   <strong class="card-title">Agregar Productos</strong>
                         </div>

                                      <br>
                          <div class="col-md-10">
                                    <div class="form-group">
                                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalProductoMaquinas">
                                           <i class="fa fa-plus" aria-hidden="true"></i>  Maquinas
                                          </button>
                                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalProductoRepuestos">
                                           <i class="fa fa-plus" aria-hidden="true"></i>  Repuestos
                                          </button>
                                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalProductoOtros">
                                           <i class="fa fa-plus" aria-hidden="true"></i>  Otros
                                          </button>
                                    </div>
                            </div>
                            <div class="container-fluid">
                              <div class="container">
                                  <div class="card">
                                      <!--=====================================
                            CABECERA CARRITO DE COMPRAS
                            ======================================-->
                                      <div class="card-header cabeceraCarrito">
                                          <div class="row">
                                              <div class="col-md-6 col-sm-7 col-xs-12 text-center">
                                                  <h3>
                                                      <small>
                                                          PRODUCTO
                                                      </small>
                                                  </h3>
                                              </div>
                                              <div class="col-md-2 col-sm-1 col-xs-0 text-center">
                                                  <h3>
                                                      <small>
                                                          PRECIO
                                                      </small>
                                                  </h3>
                                              </div>
                                              <div class="col-sm-2 col-xs-0 text-center">
                                                  <h3>
                                                      <small>
                                                          CANTIDAD
                                                      </small>
                                                  </h3>
                                              </div>
                                              <div class="col-sm-2 col-xs-0 text-center">
                                                  <h3>
                                                      <small>
                                                          SUBTOTAL
                                                      </small>
                                                  </h3>
                                              </div>
                                          </div>
                                      </div>
                                      <!--=====================================
                            CUERPO CARRITO DE COMPRAS
                            ======================================-->
                                      <div class="card-body cuerpoCarrito">
                                          <!-- item1 -->

                                      </div>
                                      <div class="card-footer cabeceraCheckout">
                                          <div class="col-md-4 col-sm-6 col-xs-12 pull-right well">
                                              <div class="form-group row">
                                                  <div class="col-xs-8">
                                                      <h4 class="sumaSubTotal">
                                                      </h4>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="">
                                         <a class="btn btn-success btn-lg pull-left " href="comprobantes_ventas">
                                              IR TABLA COMPROBANTES
                                          </a>
                                          <button class="btn btn-danger btn-lg pull-right btnComprar">
                                              REALIZAR VENTA
                                          </button>
                                      </div>
                              </div>
                          </div>





                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- .animated -->
</div><!-- .content -->


<!--=====================================
MODAL AGREGAR Maquinas
======================================-->


<div id="modalProductoMaquinas" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Buscar Maquinas</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

            <div class="box-body">

            <!-- ENTRADA PARA TABLA-->
              <table  class="table table-bordered table-striped dt-responsive tablaProductosMaquinasVenta" id="tablaProductosMaquinasVenta">
                                    <thead>
                                        <tr>
                                            <th>Agregar</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Detalles</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>

                </table>
             </div>

         </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

        </div>


      </form>

    </div>

  </div>

</div>


<div id="modalProductoRepuestos" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Buscar Producto Repuestos</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TABLA-->

           <table  class="table table-bordered table-striped dt-responsive tablaProductosRepuestosVenta" id="tablaProductosRepuestosVenta">
                                    <thead>
                                        <tr>
                                            <th>Agregar</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Detalles</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>

                                </table>
                </div>


         </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

        </div>



      </form>

    </div>

  </div>

</div>


<div id="modalProductoOtros" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Buscar Producto Otros</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TABLA-->




           <table  class="table table-bordered table-striped dt-responsive tablaProductosOtrosVenta" id="tablaProductosOtrosVenta">
                                    <thead>
                                        <tr>
                                            <th>Agregar</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>

                                </table>
             </div>


         </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

        </div>


      </form>

    </div>

  </div>

</div>