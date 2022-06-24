
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
                                    <li class="active">Empleado</li>
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
                             
                                
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">
                                          Nuevo Empleado
                                    </button>
                                
                             
                              <div class="col-md-10">
                                <center><strong class="card-title">Tabla Empleados</strong></center>
                              </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt-responsive tablaEmpleado" id="tablaEmpleado">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">#</th>
                                            <th>Nombres</th>
                                            <th>Foto</th>
                                            <th>Documento</th>
                                             <th>Direccion</th>
                                            <th>Telefono</th> 
                                            <th>Cargo</th>
                                            <th>Estado</th>
                                            <th>Email</th>
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
MODAL AGREGAR EMPLEADO
======================================-->

<div id="modalAgregarEmpleado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Agregar Empleado</h4></center>

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

             <!-- ENTRADA PARA DIRECCION  -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                <input type="text" class="form-control input-lg"  id="nuevoDireccion"  name="nuevoDireccion" placeholder="Ingresar Direccion" required>

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

                <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar Email"  required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU CARGO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg"  id="nuevoCargo" name="nuevoCargo">
                  
                  <option value="">Selecionar tipo de cargo</option>

                  <option value="mecanico">Mecanico</option>
                  <option value="tecnico">Tecnico</option>
                  <option value="soldador">Soldador</option>
                  <option value="practicante">Practicante</option>

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

          <button type="submit" class="btn btn-primary">Guardar Empleado</button>

        </div>

        <?php
    
          $crearEmpleado = new ControladorEmpleado();
          $crearEmpleado -> ctrCrearEmpleado();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EMPLEADO
======================================-->

<div id="modalEditarEmpleado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#CAC7C7; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Editar Empleado</h4><center>

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
                 <input type="hidden" id="idEmpleado" name="idEmpleado">

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

             <!-- ENTRADA PARA DIRECCION   -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" placeholder="Ingresar Direccion">

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

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="editarCargo" name="editarCargo">
                  
                  <option value="">Selecionar tipo de cargo</option>

                  <option value="mecanico">Mecanico</option>
                  <option value="tecnico">Tecnico</option>
                  <option value="soldador">Soldador</option>
                  <option value="practicante">Practicante</option>


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
          
          $editarEmpleado = new ControladorEmpleado();
          $editarEmpleado -> ctrEditarEmpleado();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php
  
  $eliminarEmpleado = new ControladorEmpleado();
  $eliminarEmpleado -> ctrEliminarEmpleado();

?> 
