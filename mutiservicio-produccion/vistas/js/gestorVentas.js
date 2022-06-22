/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/
$('.tablaVentas').DataTable({
    "ajax": "ajax/tablaventas.ajax.php",
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
$(".tablaVentas").on("click", ".btnActivar", function() {
    var idVenta = $(this).attr("idVenta");
    var estadoVenta = $(this).attr("estadoVenta");
    var datos = new FormData();
    datos.append("activarId", idVenta);
    datos.append("activarVenta", estadoVenta);
    $.ajax({
        url: "ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estadoVenta == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Anulado');
        $(this).attr('estadoVenta', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Aceptado');
        $(this).attr('estadoVenta', 0);
    }
})
/*=============================================
VISUALIZAR LA CESTA DEL CARRITO DE VENTAS
=============================================*/
var listavender = [];
if (localStorage.getItem("listaProductosVenta") != null) {
    listavender = JSON.parse(localStorage.getItem("listaProductosVenta"));
    listavender.forEach(funcionForEach);
    var precio = 0;

    function funcionForEach(item, index) {
        $(".cuerpoCarrito").append('<div clas="row itemCarrito">' + '<div class="row">' + '<div class="col-sm-1 col-xs-12">' + '<br>' + '<center>' + '<button class="btn btn-danger quitarItemCarrito" idProducto="' + item.idProducto + '">' + '<i class="fa fa-times">' + '</i>' + '</button>' + '</center>' + '</br>' + '</div>' + '<div class="col-sm-1 col-xs-12">' + '<figure>' + '<img class="img-thumbnail" src="' + item.imagen + '">' + '</img>' + '</figure>' + '</div>' + '<div class="col-sm-4 col-xs-12">' + '<br>' + '<p class="tituloCarritoCompra text-left">' + item.nombre + '</p>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-1 col-xs-12">' + '<br>' + '<p class="precioCarritoCompra text-center">' + 'S./' + '<span>' + item.precio + '</span>' + '</p>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-3 col-xs-8">' + '<br>' + '<div class="col-xs-8">' + '<center>' + '<input class="form-control cantidadItem " min="1"  type="number" value="' + item.cantidad + '" precio="' + item.precio + '" idProducto="' + item.idProducto + '" item="' + index + '">' + '</input>' + '</center>' + '</div>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-1 col-xs-4 text-center">' + '<br>' + '<p class="subTotal' + index + ' subtotales">' + '<strong>' + 'S./' + '<span>' + (Number(item.cantidad) * Number(item.precio)) + '</span>' + '</strong>' + '</p>' + '</br>' + '</div>' + '</div>' + '</div>' + '<div class="clearfix">' + '</div>');
        sumaSubtotales();
    }
} else {
    $(".cuerpoCarrito").html('<div class="well">Aún no hay productos compras.</div>');
    $(".sumaCarrito").hide();
    //$(".cabeceraCheckout").hide();
}
$(".tablaProductosMaquinasVenta").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("detallesProducto");
    if (localStorage.getItem("listaProductosVenta") == null) {
        listavender = [];
    } else {}
    listavender.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    localStorage.setItem("listaProductosVenta", JSON.stringify(listavender));
    swal({
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de ventas!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar Vendiendo!",
        confirmButtonText: "¡Ir a mi carrito de Ventas!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "vender";
        }
    });
})
$(".tablaProductosRepuestosVenta").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("detallesProducto");
    if (localStorage.getItem("listaProductosVenta") == null) {
        listavender = [];
    } else {}
    listavender.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    localStorage.setItem("listaProductosVenta", JSON.stringify(listavender));
    swal({
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de Ventas!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar Vendiendo!",
        confirmButtonText: "¡Ir a mi carrito de Ventas!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "vender";
        }
    });
})
$(".tablaProductosOtrosVenta").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("modeloProducto");
    if (localStorage.getItem("listaProductosVenta") == null) {
        listavender = [];
    } else {}
    listavender.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    localStorage.setItem("listaProductosVenta", JSON.stringify(listavender));
    /*var cantidadCesta = Number($(".cantidadCesta").html()) + 1;
    var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);
    $(".cantidadCesta").html(cantidadCesta);
    $(".sumaCesta").html(sumaCesta);
    localStorage.setItem("cantidadCesta", cantidadCesta);
    localStorage.setItem("sumaCesta", sumaCesta);*/
    /*=============================================
    MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
    =============================================*/
    swal({
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de Ventas!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar Vendiendo!",
        confirmButtonText: "¡Ir a mi carrito de ventas!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "vender";
        }
    });
})
/*=============================================
QUITAR PRODUCTOS DEL CARRITO
=============================================*/
$(document).on("click", ".quitarItemCarrito", function() {
    $(this).parent().parent().parent().remove();
    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    /*=============================================
    SI AÚN QUEDAN PRODUCTOS VOLVERLOS AGREGAR AL CARRITO (LOCALSTORAGE)
    =============================================*/
    listavender = [];
    if (idProducto.length != 0) {
        for (var i = 0; i < idProducto.length; i++) {
            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var imagenArray = $(imagen[i]).attr("src");
            var tituloArray = $(titulo[i]).html();
            var precioArray = $(precio[i]).html();
            var pesoArray = $(idProducto[i]).attr("peso");
            var tipoArray = $(cantidad[i]).attr("tipo");
            var cantidadArray = $(cantidad[i]).val();
            listaCarrito.push({
                "idProducto": idProductoArray,
                "imagen": imagenArray,
                "titulo": tituloArray,
                "precio": precioArray,
                "tipo": tipoArray,
                "peso": pesoArray,
                "cantidad": cantidadArray
            });
        }
        localStorage.setItem("listaProductosVenta", JSON.stringify(listavender));
        sumaSubtotales();
        cestaCarrito(listavender.length);
    } else {
        /*=============================================
        SI YA NO QUEDAN PRODUCTOS HAY QUE REMOVER TODO
        =============================================*/
        localStorage.removeItem("listaProductosVenta");
        localStorage.setItem("cantidadCesta", "0");
        localStorage.setItem("sumaCesta", "0");
        $(".cantidadCesta").html("0");
        $(".sumaCesta").html("0");
        $(".cuerpoCarrito").html('<div class="well">Aún no hay productos en el carrito de compras.</div>');
        $(".sumaCarrito").hide();
        $(".cabeceraCheckout").hide();
    }
})
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
GENERAR SUBTOTAL DESPUES DE CAMBIAR CANTIDAD
=============================================*/
$(document).on("change", ".cantidadItem", function() {
    var cantidad = $(this).val();
    var precio = $(this).attr("precio");
    var idProducto = $(this).attr("idProducto");
    var item = $(this).attr("item");
    $(".subTotal" + item).html('<strong>S./ <span>' + (cantidad * precio) + '</span></strong>');
    /*=============================================
    ACTUALIZAR LA CANTIDAD EN EL LOCALSTORAGE
    =============================================*/
    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    listaCarrito = [];
    for (var i = 0; i < idProducto.length; i++) {
        var idProductoArray = $(idProducto[i]).attr("idProducto");
        var imagenArray = $(imagen[i]).attr("src");
        var tituloArray = $(titulo[i]).html();
        var precioArray = $(precio[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        listavender.push({
            "idProducto": idProductoArray,
            "imagen": imagenArray,
            "titulo": tituloArray,
            "precio": precioArray,
            "cantidad": cantidadArray
        });
    }
    localStorage.setItem("listaProductosVenta", JSON.stringify(listavender));
    sumaSubtotales();
    cestaCarrito(listavender.length);
})
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
SUMA DE TODOS LOS SUBTOTALES
=============================================*/
function sumaSubtotales() {
    var subtotales = $(".subtotales span");
    var arraySumaSubtotales = [];
    for (var i = 0; i < subtotales.length; i++) {
        var subtotalesArray = $(subtotales[i]).html();
        arraySumaSubtotales.push(Number(subtotalesArray));
    }

    function sumaArraySubtotales(total, numero) {
        return total + numero;
    }
    var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
    $(".sumaSubTotal").html('<strong> <div class="form-group">  <div class="input-group"><span class="input-group-addon"> TOTAL: S./  </span> <input class="form-control sumaTotal" id="sumaTotal" value="' + (sumaTotal).toFixed(2) + ' " readonly></div></div></strong>');
    $(".sumaCesta").html((sumaTotal).toFixed(2));
    localStorage.setItem("sumaCesta", (sumaTotal).toFixed(2));
}
var num1 = Math.floor(Math.random() * 1000) + 1;
$("#productoDocumento").val(num1);
$(".btnComprar").click(function() {
    if ($("#productoCliente").val() != "" && $("#productoComprobante").val() != "" && $("#productoDocumento").val()) {
        var idcliente = $("#productoCliente").val();
        var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
        var valorItem = $(".valorItem");
        var cantidad = $(".cuerpoCarrito .cantidadItem");
        var subtotal = $(".cuerpoCarrito .subtotales span");
        var total = $(".sumaTotal").val();
        var comprobante = $("#productoComprobante").val();
        var impuesto = $(".productoImpuesto").val();
        var documento = $("#productoDocumento").val();
        var idProducto = $('.cuerpoCarrito button, .comprarAhora button');
        var metodo = "directo";
        var serie = "FR0-";
        var tituloArray = [];
        var subtotalArray = [];
        var cantidadArray = [];
        var valorItemArray = [];
        var precioArray = [];
        var idProductoArray = [];
        for (var i = 0; i < titulo.length; i++) {
            //precioArray[i] = item.precio;
            subtotalArray[i] = $(subtotal[i]).html();
            tituloArray[i] = $(titulo[i]).html();
            cantidadArray[i] = $(cantidad[i]).val();
            idProductoArray[i] = $(idProducto[i]).attr("idProducto");
            precioArray = subtotalArray[i] / cantidadArray[i];
            //alert(precioArray[i]);
        }
        var datos = new FormData();
        datos.append("idcliente", idcliente);
        datos.append("comprobante", comprobante);
        datos.append("documento", documento);
        datos.append("metodo", metodo);
        datos.append("total", total);
        datos.append("impuesto", impuesto);
        datos.append("serie", serie);
        datos.append("tituloArray", tituloArray);
        datos.append("idProductoArray", idProductoArray);
        datos.append("subtotalArray", subtotalArray);
        datos.append("cantidadArray", cantidadArray);
        datos.append("precioArray", precioArray);
        $.ajax({
            url: "ajax/ventas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                //alert(respuesta);
                //listavender = [];
                listavender = [];
                localStorage.removeItem("listaProductosVenta");
                localStorage.setItem("cantidadCesta", "0");
                localStorage.setItem("sumaCesta", "0");
                $(".cantidadCesta").html("0");
                $(".sumaCesta").html("0");
                $(".cuerpoCarrito").html('<div class="well">Se elimino datos de Carrito de compras. Si desea puede realizar una nueva compra.</div>');
                $(".sumaCarrito").hide();
                $(".cabeceraCheckout").hide();
                swal({
                    title: "¡Se Registro la Venta!",
                    text: "¡Por favor puede verficar su comprobante ...! Tabla Comprobantes !",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        history.back();
                        window.location = 'vender';
                    }
                });
            }
        })
    } else {
        swal({
            title: "Llenar todos los campos obligatorios",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
})