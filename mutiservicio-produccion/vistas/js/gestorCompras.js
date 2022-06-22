/*=============================================
CARGAR LA TABLA DINÁMICA DE COMPRAS
=============================================*/
$('.tablaCompras').DataTable({
    "ajax": "ajax/tablacompras.ajax.php",
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
$(".tablaCompras").on("click", ".btnActivar", function() {
    var idCompra = $(this).attr("idCompra");
    var estadoCompra = $(this).attr("estadoCompra");
    var datos = new FormData();
    datos.append("activarId", idCompra);
    datos.append("activarCompra", estadoCompra);
    $.ajax({
        url: "ajax/compras.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })
    if (estadoCompra == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Anulado');
        $(this).attr('estadoCompra', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Aceptado');
        $(this).attr('estadoCompra', 0);
    }
})
/*=============================================
VISUALIZAR LA CESTA DEL CARRITO DE COMPRAS
=============================================*/
var listacomprar = [];
if (localStorage.getItem("listaProductos") != null) {
    listacomprar = JSON.parse(localStorage.getItem("listaProductos"));
    listacomprar.forEach(funcionForEach);
    var precio = 0;

    function funcionForEach(item, index) {
        $(".cuerpoCarritoCompra").append('<div clas="row itemCarrito">' + '<div class="row">' + '<div class="col-sm-1 col-xs-12">' + '<br>' + '<center>' + '<button class="btn btn-danger quitarItemCarrito" idProducto="' + item.idProducto + '">' + '<i class="fa fa-times">' + '</i>' + '</button>' + '</center>' + '</br>' + '</div>' + '<div class="col-sm-1 col-xs-12">' + '<figure>' + '<img class="img-thumbnail" src="' + item.imagen + '">' + '</img>' + '</figure>' + '</div>' + '<div class="col-sm-4 col-xs-12">' + '<br>' + '<p class="tituloCarritoCompra text-left">' + item.nombre + '</p>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-1 col-xs-12">' + '<br>' + '<p class="precioCarritoCompra text-center">' + 'S./' + '<span>' + item.precio + '</span>' + '</p>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-3 col-xs-8">' + '<br>' + '<div class="col-xs-8">' + '<center>' + '<input class="form-control cantidadItem " min="1"  type="number" value="' + item.cantidad + '" precio="' + item.precio + '" idProducto="' + item.idProducto + '" item="' + index + '">' + '</input>' + '</center>' + '</div>' + '</br>' + '</div>' + '<div class="col-md-2 col-sm-1 col-xs-4 text-center">' + '<br>' + '<p class="subTotal' + index + ' subtotales">' + '<strong>' + 'S./' + '<span>' + (Number(item.cantidad) * Number(item.precio)) + '</span>' + '</strong>' + '</p>' + '</br>' + '</div>' + '</div>' + '</div>' + '<div class="clearfix">' + '</div>');
        sumaSubtotales();
    }
} else {
    $(".cuerpoCarritoCompra").html('<div class="well">Aún no hay productos compras.</div>');
    $(".sumaCarrito").hide();
    //$(".cabeceraCheckout").hide();
}
$(".tablaProductosMaquinas").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("detallesProducto");
    if (localStorage.getItem("listaProductos") == null) {
        listacomprar = [];
    } else {}
    listacomprar.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    localStorage.setItem("listaProductos", JSON.stringify(listacomprar));
    swal({
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar comprando!",
        confirmButtonText: "¡Ir a mi carrito de compras!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "comprar";
        }
    });
})
$(".tablaProductosRepuestos").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("detallesProducto");
    if (localStorage.getItem("listaProductos") == null) {
        listacomprar = [];
    } else {}
    listacomprar.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    localStorage.setItem("listaProductos", JSON.stringify(listacomprar));
    swal({
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar comprando!",
        confirmButtonText: "¡Ir a mi carrito de compras!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "comprar";
        }
    });
})
$(".tablaProductosOtros").on("click", ".btnAgregarProductos", function() {
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagenProducto");
    var nombre = $(this).attr("nombreProducto");
    var precio = $(this).attr("precioProducto");
    var detalles = $(this).attr("modeloProducto");
    if (localStorage.getItem("listaProductos") == null) {
        listacomprar = [];
    } else {}
    listacomprar.push({
        "idProducto": idProducto,
        "imagen": imagen,
        "nombre": nombre,
        "precio": precio,
        "cantidad": 1
    });
    console.log("hola ever");
    console.log("listaproducto", listacomprar);
    localStorage.setItem("listaProductos", JSON.stringify(listacomprar));
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
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "¡Continuar comprando!",
        confirmButtonText: "¡Ir a mi carrito de compras!",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            window.location = "comprar";
        }
    });
})
/*=============================================
QUITAR PRODUCTOS DEL CARRITO
=============================================*/
$(document).on("click", ".quitarItemCarrito", function() {
    $(this).parent().parent().parent().remove();
    var idProducto = $(".cuerpoCarritoCompra button");
    var imagen = $(".cuerpoCarritoCompra img");
    var titulo = $(".cuerpoCarritoCompra .tituloCarritoCompra");
    var precio = $(".cuerpoCarritoCompra .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarritoCompra .cantidadItem");
    /*=============================================
    SI AÚN QUEDAN PRODUCTOS VOLVERLOS AGREGAR AL CARRITO (LOCALSTORAGE)
    =============================================*/
    listacomprar = [];
    if (idProducto.length != 0) {
        for (var i = 0; i < idProducto.length; i++) {
            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var imagenArray = $(imagen[i]).attr("src");
            var tituloArray = $(titulo[i]).html();
            var precioArray = $(precio[i]).html();
            var pesoArray = $(idProducto[i]).attr("peso");
            var tipoArray = $(cantidad[i]).attr("tipo");
            var cantidadArray = $(cantidad[i]).val();
            listacomprar.push({
                "idProducto": idProductoArray,
                "imagen": imagenArray,
                "titulo": tituloArray,
                "precio": precioArray,
                "tipo": tipoArray,
                "peso": pesoArray,
                "cantidad": cantidadArray
            });
        }
        localStorage.setItem("listaProductos", JSON.stringify(listacomprar));
        sumaSubtotales();
        cestaCarrito(listacomprar.length);
    } else {
        /*=============================================
        SI YA NO QUEDAN PRODUCTOS HAY QUE REMOVER TODO
        =============================================*/
        localStorage.removeItem("listaProductos");
        localStorage.setItem("cantidadCesta", "0");
        localStorage.setItem("sumaCesta", "0");
        $(".cantidadCesta").html("0");
        $(".sumaCesta").html("0");
        $(".cuerpoCarritoCompra").html('<div class="well">Aún no hay productos en el carrito de compras.</div>');
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
    var idProducto = $(".cuerpoCarritoCompra button");
    var imagen = $(".cuerpoCarritoCompra img");
    var titulo = $(".cuerpoCompra .tituloCarritoCompra");
    var precio = $(".cuerpoCompra .precioCarritoCompra span");
    var cantidad = $(".cuerpoCompra .cantidadItem");
    listacomprar = [];
    for (var i = 0; i < idProducto.length; i++) {
        var idProductoArray = $(idProducto[i]).attr("idProducto");
        var imagenArray = $(imagen[i]).attr("src");
        var tituloArray = $(titulo[i]).html();
        var precioArray = $(precio[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        listacomprar.push({
            "idProducto": idProductoArray,
            "imagen": imagenArray,
            "titulo": tituloArray,
            "precio": precioArray,
            "cantidad": cantidadArray
        });
    }
    localStorage.setItem("listaProductos", JSON.stringify(listacomprar));
    sumaSubtotales();
    cestaCarrito(listacomprar.length);
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
$(".btnComprar").click(function() {
    if ($("#productoProveedor").val() != "" && $("#productoComprobante").val() != "" && $("#productoDocumento").val()) {
        var idproveedor = $("#productoProveedor").val();
        var titulo = $(".cuerpoCarritoCompra .tituloCarritoCompra");
        var valorItem = $(".valorItem");
        var cantidad = $(".cuerpoCarritoCompra .cantidadItem");
        var subtotal = $(".cuerpoCarritoCompra .subtotales span");
        var total = $(".sumaTotal").val();
        var comprobante = $("#productoComprobante").val();
        var impuesto = $(".productoImpuesto").val();
        var documento = $("#productoDocumento").val();
        var idProducto = $('.cuerpoCarritoCompra button, .comprarAhora button');
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
            //alert(precioArray[i]);
        }
        var datos = new FormData();
        datos.append("idproveedor", idproveedor);
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
        $.ajax({
            url: "ajax/compras.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                // listaCarrito = [];
                listacomprar = [];
                localStorage.removeItem("listaProductos");
                localStorage.setItem("cantidadCesta", "0");
                localStorage.setItem("sumaCesta", "0");
                $(".cantidadCesta").html("0");
                $(".sumaCesta").html("0");
                $(".cuerpoCarritoCompra").html('<div class="well">Se elimino datos de Carrito de compras. Si desea puede realizar una nueva compra.</div>');
                $(".sumaCarrito").hide();
                $(".cabeceraCheckout").hide();
                swal({
                    title: "¡Se Registro la Compra!",
                    text: "¡Por favor puede verficar su comprobante ...! Tabla Comprobantes !",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        history.back();
                        window.location = 'comprar';
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