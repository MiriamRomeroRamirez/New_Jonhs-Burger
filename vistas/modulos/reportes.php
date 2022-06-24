<?php

require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";

require_once "../../controladores/compras.controlador.php";
require_once "../../modelos/compras.modelo.php";

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";

require_once "../../controladores/proveedor.controlador.php";
require_once "../../modelos/proveedor.modelo.php";

require_once "../../controladores/cliente.controlador.php";
require_once "../../modelos/cliente.modelo.php";

require_once "../../controladores/productos.controlador.php";
require_once "../../modelos/productos.modelo.php";

require_once "../../controladores/maquina.controlador.php";
require_once "../../modelos/maquina.modelo.php";

require_once "../../controladores/repuesto.controlador.php";
require_once "../../modelos/repuesto.modelo.php";

require_once "../../controladores/otros.controlador.php";
require_once "../../modelos/otros.modelo.php";

$reporte = new ControladorReportes();
$reporte->ctrDescargarReporte();
