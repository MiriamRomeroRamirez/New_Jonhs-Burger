<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administradores</title>

    <!--css link-->
    <link rel="apple-touch-icon" href="vistas/img/plantilla/logo-burger.png">
    <link rel="shortcut icon" href="vistas/img/plantilla/logo-burger.png">

    <!--CSS LIBRERIAS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">


        <!--css INTERNAS -->

    <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">
    <link rel="stylesheet" href="vistas/plugins/Tag-Input/tagsinput.css">
    <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">
    <link rel="stylesheet" href="vistas/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vistas/css/tabla-compras.css">
    <link rel="stylesheet" href="vistas/assets/css/style.css">
    <link rel="stylesheet" href="vistas/css/principal.css">

    <!--JS LIBRERIAS -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <script src="vistas/plugins/Tag-Input/tagsinput.js"></script>
    <script src="vistas/plugins/dropzone/dropzone.js"></script>
    <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>


        <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="vistas/assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="vistas/assets/js/init/weather-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>




</head>
<body class="">

    <!-- /menu -->
    <?php

if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {

    include "modulos/menu.php";

    echo '<div id="right-panel" class="right-panel">';

    include "modulos/cabezote.php";

    if (isset($_GET["ruta"])) {

        if ($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "administrador" ||
            $_GET["ruta"] == "proveedor" ||
            $_GET["ruta"] == "cliente" ||
            $_GET["ruta"] == "empleado" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "tablacompras" ||
            $_GET["ruta"] == "tablaventas" ||
            $_GET["ruta"] == "comprobantes_compra" ||
            $_GET["ruta"] == "comprobantes_ventas" ||
            $_GET["ruta"] == "comprar" ||
            $_GET["ruta"] == "maquinas" ||
            $_GET["ruta"] == "repuestos" ||
            $_GET["ruta"] == "otros" ||
            $_GET["ruta"] == "tablaventas" ||
            $_GET["ruta"] == "vender" ||
            $_GET["ruta"] == "reportes" ||
            $_GET["ruta"] == "reportes1" ||
            $_GET["ruta"] == "salir") {

            include "modulos/" . $_GET["ruta"] . ".php";

        }

    } else {

        include "modulos/inicio.php";

    }

    echo '</div>';
    include "modulos/footer.php";

} else {
    include "modulos/login.php";
}

?>
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/gestorAdministrador.js"></script>
    <script src="vistas/js/gestorProductos.js"></script>
    <script src="vistas/js/gestorProveedor.js"></script>
    <script src="vistas/js/gestorEmpleado.js"></script>
    <script src="vistas/js/gestorCliente.js"></script>
    <script src="vistas/js/gestorMaquina.js"></script>
    <script src="vistas/js/gestorRepuesto.js"></script>
    <script src="vistas/js/gestorOtros.js"></script>
    <script src="vistas/js/gestorCompras.js"></script>
    <script src="vistas/js/gestorVentas.js"></script>
    <script src="vistas/js/gestorProductoMaquina.js"></script>
    <script src="vistas/js/gestorProductoOtros.js"></script>
    <script src="vistas/js/gestorProductoRepuesto.js"></script>
    <script src="vistas/js/gestorProductoMaquinaVenta.js"></script>
    <script src="vistas/js/gestorProductoOtrosVenta.js"></script>
    <script src="vistas/js/gestorProductoRepuestoVenta.js"></script>
    <script src="vistas/js/gestorComprobantesCompra.js"></script>
    <script src="vistas/js/gestorComprobantesVenta.js"></script>



</body>
</html>