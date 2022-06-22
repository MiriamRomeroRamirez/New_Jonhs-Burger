<?php

#<<< Llamado a controladores>>
require_once "controladores/plantilla.controlador.php";
require_once "controladores/administrador.controlador.php";
require_once "controladores/proveedor.controlador.php";
require_once "controladores/empleado.controlador.php";
require_once "controladores/cliente.controlador.php";
require_once "controladores/tipo_motor.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/maquina.controlador.php";
require_once "controladores/repuesto.controlador.php";
require_once "controladores/otros.controlador.php";
require_once "controladores/departamento.controlador.php";

#<<<llamado a Modelos>>>

require_once "modelos/rutas.php";
require_once "modelos/administrador.modelo.php";
require_once "modelos/proveedor.modelo.php";
require_once "modelos/empleado.modelo.php";
require_once "modelos/empresa.modelo.php";
require_once "modelos/cliente.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/maquina.modelo.php";
require_once "modelos/repuesto.modelo.php";
require_once "modelos/otros.modelo.php";
require_once "modelos/departamento.modelo.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
