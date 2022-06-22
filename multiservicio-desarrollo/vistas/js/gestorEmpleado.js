/*=============================================
CARGAR LA TABLA DINÁMICA DE EMPLEADO
=============================================*/

$('.tablaEmpleado').DataTable({

	"ajax":"ajax/tablaempleado.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});


$(".tablaEmpleado").on("click", ".btnActivar", function(){


  var idEmpleado = $(this).attr("idEmpleado");
  var estadoEmpleado = $(this).attr("estadoEmpleado");

  var datos = new FormData();
  datos.append("activarId", idEmpleado);
    datos.append("activarEmpleado", estadoEmpleado);

    $.ajax({

    url:"ajax/empleado.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
         
        console.log("respuesta", respuesta);
      }

    })

    if(estadoEmpleado == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoEmpleado',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoEmpleado',0);

    }

})

/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
$(".nuevaFoto").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

    }
})

/*=============================================
EDITAR PERFIL
=============================================*/


$(".tablaEmpleado").on("click", ".btnEditarEmpleado", function(){


  var idEmpleado = $(this).attr("idEmpleado");

  
  var datos = new FormData();
  datos.append("idEmpleado", idEmpleado);


  $.ajax({

    url:"ajax/empleado.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarApellidos").val(respuesta["apellidos"]);
      $("#editarDocumento").val(respuesta["documento"]);
      $("#idProveedor").val(respuesta["id"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarDireccion").val(respuesta["direccion"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#editartipo").val(respuesta["cargo"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["foto"]);

      }

    }


  })


})

/*=============================================
ELIMINAR EMPLEADO
=============================================*/


$(".tablaEmpleado").on("click", ".btnEliminarEmpleado", function(){



  var Empleado = $(this).attr("idEmpleado");
  var fotoEmpleado = $(this).attr("fotoEmpleado");


  swal({
    title: '¿Está seguro de borrar el empleado?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Empleado!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=empleado&idEmpleado="+idEmpleado+"&fotoEmpleado="+fotoEmpleado;

    }

  })

})

