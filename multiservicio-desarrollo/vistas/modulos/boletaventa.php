<?php

include '../../modelos/conexion.php';
include '../../modelos/empresa.modelo.php';
include '../../modelos/ventas.modelo.php';
include '../../modelos/productos.modelo.php';
include '../../modelos/maquina.modelo.php';
include '../../modelos/repuesto.modelo.php';
include '../../modelos/otros.modelo.php';
include '../../modelos/cliente.modelo.php';

include '../../controladores/ventas.controlador.php';
include '../../controladores/productos.controlador.php';
include '../../controladores/maquina.controlador.php';
include '../../controladores/repuesto.controlador.php';
include '../../controladores/otros.controlador.php';
include '../../controladores/cliente.controlador.php';

require '../../extensiones/fpdf/fpdf.php';
require '../../extensiones/phpqrcode/qrlib.php';
require '../../modelos/numletras.php';

$idventa = $_GET['idboleta'];

static $fecha;
static $cliente;
static $igv;
static $exonerado;
static $inafecta;
static $gravado;
static $direccion1;
static $razonsocial;
static $ruc;
static $rucemp;
static $codbar;
static $distrito;
static $departamento;
static $provincia;
static $textfactura;
static $direccion2;
static $total;
static $serie;
static $numero;
static $moneda1;
static $digestvalue;
static $observacion;

$tabla = "empresa";
$item  = "id";
$valor = 1;

$empresa = ModeloEmpresa::mdlMostrarEmpresaInfo($tabla, $item, $valor);

$razonsocial     = $empresa['razon_social'];
$codbar          = $empresa['emp_codbar'];
$rucemp          = $empresa['emp_ruc'];
$provincia       = $empresa['emp_provincia'];
$distrito        = $empresa['emp_distrito'];
$departamento    = $empresa['emp_departamento'];
$direccion1      = $empresa['emp_direccion'];
$textfactura     = $empresa['emp_textpdffactura'];
$nombrecomercial = $empresa['nombre_comercial'];

$dir = 'temp/';
if (!file_exists($dir)) {
    mkdir($dir);
}

$filename  = $dir . 'test.png';
$tamaño   = 10;
$level     = 'L';
$framSize  = 3;
$contenido = $codbar;
QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
$img = $dir . basename($filename);

$item  = "id";
$valor = $idventa;

$venta = ControladorVentas::ctrMostrarVentasInfo($item, $valor);

$id          = $venta['id'];
$serie       = $venta['serie'];
$numero      = $venta['num_doc'];
$fecha       = $venta['fecha'];
$idcliente   = $venta['id_cliente'];
$idformapago = $venta['idforma_pago'];
$estado      = $venta['estado'];
$total       = $venta['total'];

$item       = "id";
$valor      = $idcliente;
$resultado1 = ControladorCliente::ctrMostrarClienteInfo($item, $valor);
$cliente    = $resultado1["nombre"] . ' ' . $resultado1["apellidos"];
$ruc        = $resultado1["documento"];
$direccion1 = $resultado1["direccion"];
$telefono   = $resultado1["telefono"];

if ($venta['moneda'] == 'PEN') {
    $moneda1 = 'SOLES';
} else { $moneda1 = 'DOLARES U OTRO';}

$pdf = new FPDF('P', 'mm', array(297, 210));
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(46, 8);
$pdf->Cell(80, 10, $razonsocial);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(53, 16);
$pdf->Cell(80, 10, $direccion1);

if (!file_exists($dir)) {
    mkdir($dir);
}

$dir      = 'temp/';
$filename = $dir . 'logo.png';
$img1     = $dir . basename($filename);

$pdf->SetXY(2, 2);
$pdf->Image($img1, 10, 6, -160);

$pdf->Rect(127, 5, 75, 26);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(130, 8);
$pdf->Cell(90, 10, "RUC NRO  " . $rucemp);

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(130, 15);
$pdf->Cell(90, 10, 'BOLETA ELECTRONICA');

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(145, 21);
$pdf->Cell(100, 10, $serie . '-' . $numero);

$pdf->Rect(10, 37, 190, 32);

$pdf->SetFont('Arial', '', 10);

$pdf->SetXY(15, 38);
$pdf->Cell(45, 10, 'DOCUMENTO: ');
$pdf->SetXY(45, 38);
$pdf->Cell(40, 10, $ruc);

$pdf->SetXY(130, 38);
$pdf->Cell(40, 10, 'FECHA EMISION: ');
$pdf->SetXY(165, 38);
$pdf->Cell(40, 10, $fecha);

$pdf->SetXY(15, 45);
$pdf->Cell(10, 10, 'NOMBRE: ');
$pdf->SetXY(45, 45);
$pdf->Cell(10, 10, substr($cliente, 0, 40));
$pdf->SetXY(45, 50);
$pdf->Cell(60, 10, substr($cliente, 40, 40));

$pdf->SetXY(130, 45);
$pdf->Cell(10, 10, 'MONEDA: ');
$pdf->SetXY(165, 45);
$pdf->Cell(40, 10, $moneda1);

$pdf->SetXY(130, 50);
$pdf->Cell(10, 10, 'CONDICION DE PAGO: ');

$pdf->SetXY(130, 55);
$pdf->Cell(10, 10, 'GUIA REMISION: ');

$pdf->SetXY(15, 55);
$pdf->Cell(60, 10, 'DIRECCION: ');
$pdf->SetXY(45, 55);
$pdf->Cell(60, 10, substr($direccion2, 0, 43));

$pdf->SetXY(45, 60);
$pdf->Cell(60, 10, substr($direccion2, 43, 40));

$pdf->Rect(10, 72, 190, 8);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(15, 70);
$pdf->Cell(40, 12, 'CODIGO');

$pdf->SetXY(40, 70);
$pdf->Cell(40, 12, 'CANTID');

$pdf->SetXY(70, 70);
$pdf->Cell(40, 12, 'DESCRIPCION');

$pdf->SetXY(130, 70);
$pdf->Cell(40, 12, 'PRECIO UNID');

$pdf->SetXY(170, 70);
$pdf->Cell(40, 12, 'IMPORTE');

$y        = 83;
static $i = 0;
$pdf->SetFont('Arial', '', 10);

$item  = "idventas";
$valor = $idventa;

$detalles = ControladorVentas::ctrMostrarDetallesVentasInfo($item, $valor);

foreach ($detalles as $key => $row) {

    $pdf->SetXY(20, $y);
    $pdf->Cell(30, 6, $row['idproductos']);

    $pdf->SetXY(40, $y);
    $pdf->Cell(20, 6, utf8_decode($row['cantidad']));

    $pdf->SetXY(60, $y);
    $pdf->Cell(70, 6, utf8_decode(substr($row['titulo'], 0, 24)));

    $pdf->SetXY(130, $y);
    $pdf->Cell(30, 6, utf8_decode(number_format($row['precio'], 2, '.', ',')));

    $pdf->SetXY(170, $y);
    $pdf->Cell(30, 6, utf8_decode(number_format($row['subtotal'], 2, '.', ',')));

    if (strlen(utf8_decode($row['titulo'])) >= 24) {
        $y = $y + 5;
        $pdf->SetXY(60, $y);
        $pdf->Cell(70, 6, utf8_decode(substr($row['titulo'], 24, 40)));

    }
    $y = $y + 5;
}

$pdf->SetFont('Arial', '', 12);
$pdf->Rect(10, $y + 117, 190, 9);
$pdf->SetXY(15, $y + 119);
$pdf->Cell(0, 6, 'SON: ' . num2letras(number_format($total, 2, '.', ',')));

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(20, $y + 125);
$pdf->Cell(10, 10, 'Resumen: ' . $digestvalue);

$pdf->SetXY(20, $y + 130);
$pdf->Cell(10, 10, 'Observacion: ' . $observacion);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(135, $y + 128);
$pdf->Cell(10, 10, 'SUBTOTAL: ');
$pdf->SetXY(170, $y + 128);
$pdf->Cell(10, 10, 'S/.   ' . number_format($total, 2, '.', ','));

$pdf->SetXY(135, $y + 133);
$pdf->Cell(10, 10, 'OP. GRAVADAS:');
$pdf->SetXY(170, $y + 133);
$pdf->Cell(10, 10, 'S/.    ' . number_format($gravado, 2, '.', ','));

$pdf->SetXY(135, $y + 138);
$pdf->Cell(10, 10, 'OP. INAFECTAS: ');
$pdf->SetXY(170, $y + 138);
$pdf->Cell(10, 10, 'S/.    ' . number_format($inafecta, 2, '.', ','));

$pdf->SetXY(135, $y + 143);
$pdf->Cell(10, 10, 'OP. EXONERADAS:');
$pdf->SetXY(170, $y + 143);
$pdf->Cell(10, 10, 'S/.    ' . number_format($exonerado, 2, '.', ','));

$pdf->SetXY(135, $y + 148);
$pdf->Cell(10, 10, 'IGV: ');
$pdf->SetXY(170, $y + 148);
$pdf->Cell(10, 10, 'S/.    ' . number_format($igv, 2, '.', ','));

$pdf->SetXY(135, $y + 153);
$pdf->Cell(10, 10, 'TOTAL: ');
$pdf->SetXY(170, $y + 153);
$pdf->Cell(10, 10, 'S/.    ' . number_format($total, 2, '.', ','));

$pdf->SetXY(10, $y + 110);
$pdf->Image($img, 75, $y + 127, -160);

$textfacturautf = utf8_decode($textfactura);

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(18, $y + 167);
$pdf->Cell(10, 10, substr($textfacturautf, 0, 100));
$pdf->SetXY(18, $y + 172);
$pdf->Cell(10, 10, substr($textfacturautf, 100, 100));

$pdf->Output();
