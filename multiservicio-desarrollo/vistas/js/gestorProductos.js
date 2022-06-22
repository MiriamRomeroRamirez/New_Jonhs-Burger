/*=============================================
CARGAR LA TABLA INVENTARIO PRODUCTOS 
=============================================*/
$('.tablaProductos').DataTable({
    "ajax": "ajax/tablaproductos.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
$(".tablaProductos").on("click", ".btnActivar", function() {
    var idProducto = $(this).attr("idProducto");
    var estadoProducto = $(this).attr("estadoProducto");
    var datos = new FormData();
    datos.append("activarId", idProducto);
    datos.append("activarProducto", estadoProducto);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estadoProducto == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoProducto', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoProducto', 0);
    }
})
/*=============================================
EDITAR PRODUCTOS
=============================================*/
$(".tablaProductos").on("click", ".btnEditarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            //alert(respuesta);
            $("#editarPrecio").val(respuesta["precio"]);
            $("#editarCantidad").val(respuesta["cantidad"]);
            $("#idProducto").val(respuesta["id"]);
        }
    })
})