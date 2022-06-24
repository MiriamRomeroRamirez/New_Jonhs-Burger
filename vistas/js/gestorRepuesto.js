/*=============================================
CARGAR LA TABLA DINÁMICA DE REPUESTO
=============================================*/

$('.tablaRepuesto').DataTable({

	"ajax":"ajax/tablarepuesto.ajax.php",
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



/*===========================================
SUBIENDO LA FOTO DEL REPUESTO
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
EDITAR REPUESTO
=============================================*/


$(".tablaRepuesto").on("click", ".btnEditarRepuesto", function(){


  var idRepuesto = $(this).attr("idRepuesto");

  
  var datos = new FormData();
  datos.append("idRepuesto", idRepuesto);

  $.ajax({

    url:"ajax/repuesto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
 
    
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarDetalles").val(respuesta["detalles"]);
      $("#editarEspecificacion").val(respuesta["especificaciones"]);
      $("#idRepuesto").val(respuesta["id"]);
      $("#editarMarca").val(respuesta["marca"]);
      $("#editarColor").val(respuesta["color"]);
      $("#fotoActual").val(respuesta["imagen"]);
      $("#editarMaquina").val(respuesta["id_maquinas"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["imagen"]);

      }

    }


  })


})

/*=============================================
ELIMINAR REPUESTO
=============================================*/

$(".tablaRepuesto").on("click", ".btnEliminarRepuesto", function(){



  var idRepuesto = $(this).attr("idRepuesto");
  var fotoRepuesto = $(this).attr("fotoRepuesto");


  swal({
    title: '¿Está seguro de borrar el Otros?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Repuestos!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=repuestos&idRepuesto="+idRepuesto+"&fotoRepuesto="+fotoRepuesto;

    }

  })

})

