<?php
include 'clases/conexion.php';
require 'fpdf/fpdf.php';
require 'phpqrcode/qrlib.php';
include 'clases/numletras.php';

$id = $_GET['idfactura'];
static $fecha;
static $cliente;
static $igv;
static $exonerado;
static $efectivo;
static $gravado;
static $direccion;
static $razonsocial;
static $ruc;
static $rucemp;
static $codbar;
static $distrito;
static $departamento;
static $provincia;
static $textfactura;
static $direccion1;
static $serie;
static $numero;

$con = new Conexion();
$sql = "SELECT  empr_razonsocial,empr_codbar,empr_ruc,empr_nombrecomercial,empr_departamento,empr_distrito,empr_direccion,empr_textpdffactura,empr_provinicia FROM configuracionempresa";
mysqli_set_charset($con, "utf8");
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $razonsocial     = $row['empr_razonsocial'];
    $codbar          = $row['empr_codbar'];
    $rucemp          = $row['empr_ruc'];
    $provincia       = $row['empr_provinicia'];
    $distrito        = $row['empr_distrito'];
    $departamento    = $row['empr_departamento'];
    $direccion       = $row['empr_direccion'];
    $textfactura     = $row['empr_textpdffactura'];
    $nombrecomercial = $row['empr_nombrecomercial'];
}
$con->close();

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

$con2 = new Conexion();
$sql2 = "SELECT  facturacion.fact_inafecta as inafecta,facturacion.fact_serie as serie,facturacion.fact_numero as numero,facturacion.cod_facturacion as cod_facturacion ,cliente.clie_direccion as direccion ,cliente.clie_ruc as ruc, facturacion.fact_total as total, facturacion.fact_exonerado as exonerado,facturacion.fact_gravado as gravado,facturacion.fact_efectivo as efectivo, facturacion.fact_fechaemision as fechaemision, facturacion.fact_igv as igv,facturacion.fact_numero as numero,facturacion.fact_fechaeliminado as fechaeliminado, cliente.clie_nombre as cliente, moneda.mone_descripcion as moneda FROM facturacion INNER JOIN moneda ON facturacion.cod_moneda = moneda.cod_moneda INNER JOIN cliente ON facturacion.cod_cliente = cliente.cod_cliente WHERE facturacion.cod_facturacion='$id'";
mysqli_set_charset($con2, "utf8");
$result = mysqli_query($con2, $sql2);

while ($row = mysqli_fetch_assoc($result)) {
    $id         = $row['cod_facturacion'];
    $fecha      = $row['fechaemision'];
    $cliente    = $row['cliente'];
    $exonerado  = $row['exonerado'];
    $efectivo   = $row['efectivo'];
    $direccion1 = $row['direccion'];
    $gravado    = $row['gravado'];
    $total      = $row['total'];
    $ruc        = $row['ruc'];
    $serie      = $row['serie'];
    $numero     = $row['numero'];
}
$con2->close();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);

$pdf->SetXY(55, 8);
$pdf->Cell(100, 10, $razonsocial);

$pdf->SetXY(80, 16);
$pdf->Cell(100, 10, $rucemp);

$pdf->SetXY(55, 24);
$pdf->Cell(100, 10, $direccion);

$pdf->SetXY(45, 32);
$pdf->Cell(100, 10, $departamento);
$pdf->SetXY(77, 32);
$pdf->Cell(100, 10, '-' . $distrito);
$pdf->SetXY(111, 32);
$pdf->Cell(80, 10, '-' . $provincia);

$pdf->SetXY(50, 40);
$pdf->Cell(100, 10, 'FACTURA ELECTRONICA  ' . $numero . '-' . $serie);

$pdf->SetFont('Arial', '', 16);
$pdf->SetXY(15, 50);
$pdf->Cell(40, 10, 'FECHAEMISION:' . $fecha);

$pdf->SetXY(120, 50);
$pdf->Cell(40, 10, 'RUC:' . $ruc);

$pdf->SetXY(15, 57);
$pdf->Cell(10, 10, substr('RAZONSOCIAL: ' . $cliente, 0, 30));
$pdf->SetXY(45, 63);
$pdf->Cell(60, 10, substr($cliente, 30, 40));

$pdf->SetXY(15, 69);
$pdf->Cell(60, 10, substr('DIRECCION: ' . $direccion, 0, 30));

$pdf->SetXY(45, 74);
$pdf->Cell(60, 10, substr($direccion, 30, 40));

$pdf->SetXY(10, 80);

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

$pdf->SetXY(10, 83);
$pdf->Cell(40, 12, 'COD');
$pdf->SetXY(45, 83);
$pdf->Cell(40, 12, 'DESCRIPCION');
$pdf->SetXY(118, 83);
$pdf->Cell(40, 12, 'CANT');
$pdf->SetXY(137, 83);
$pdf->Cell(40, 12, 'P.UNIDAD');
$pdf->SetXY(170, 83);
$pdf->Cell(40, 12, 'IMPORTE');

$pdf->SetXY(10, 88);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

$con1 = new Conexion();
$sql1 = "SELECT  transaccion.tran_cantidad as cantidad,transaccion.tran_preciou as preciou, transaccion.tran_importe importe,producto.prod_descripcion as descripcion, transaccion.cod_transaccion as cod_transaccion FROM transaccion INNER JOIN producto on transaccion.cod_facturacion=producto.cod_producto  WHERE transaccion.cod_facturacion='$id'";
mysqli_set_charset($con1, "utf8");
$result = mysqli_query($con1, $sql1);
$y      = 95;
while ($row = $result->fetch_assoc()) {

    $pdf->SetXY(10, $y);
    $pdf->Cell(20, 6, $row['cod_transaccion']);
    $pdf->SetXY(30, $y);
    $pdf->Cell(80, 6, utf8_decode(substr($row['descripcion'], 0, 31)));
    $pdf->SetXY(123, $y);
    $pdf->Cell(20, 6, utf8_decode($row['cantidad']));
    $pdf->SetXY(138, $y);
    $pdf->Cell(30, 6, utf8_decode($row['preciou']));
    $pdf->SetXY(170, $y);
    $pdf->Cell(30, 6, utf8_decode($row['importe']));
    if (strlen(utf8_decode($row['descripcion'])) >= 31) {
        $y = $y + 7;
        $pdf->SetXY(28, $y);
        $pdf->Cell(70, 6, utf8_decode(substr($row['descripcion'], 31, 40)));

    }
    $y = $y + 7;
}
$con1->close();
$pdf->SetXY(10, $y + 0);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

$pdf->SetFont('Arial', '', 16);
$pdf->SetXY(110, $y + 6);
$pdf->Cell(10, 10, 'TOTAL A PAGAR: ' . $total);

$pdf->SetXY(10, $y + 12);
$pdf->Cell(40, 10, '-----------------------------------------------------------------------------------------------------');

$pdf->SetXY(110, $y + 19);
$pdf->Cell(10, 10, 'EXONERADAS: ' . $exonerado);

$pdf->SetXY(110, $y + 27);
$pdf->Cell(10, 10, 'GRAVADAS: ' . $gravado);

$pdf->SetXY(110, $y + 35);
$pdf->Cell(10, 10, 'IMPORTE TOTAL: ' . $total);

$pdf->SetXY(10, $y + 40);
$pdf->Cell(40, 10, '-----------------------------------------------------------------------------------------------------');

$pdf->SetXY(110, $y + 48);
$pdf->Cell(10, 10, 'EFECTIVO: ' . $efectivo);

$pdf->SetXY(110, $y + 57);
$pdf->Cell(10, 10, 'TARJETA: ');

$pdf->SetXY(10, $y + 66);
$pdf->Cell(0, 6, 'SON: ' . num2letras($total));

$pdf->Image($img, 80, $y + 71, -100);
$textfacturautf = utf8_decode($textfactura);
$pdf->SetFont('Arial', '', 14);
$pdf->SetXY(10, $y + 135);
$pdf->Cell(10, 10, substr($textfacturautf, 0, 76));
$pdf->SetXY(10, $y + 140);
$pdf->Cell(10, 10, substr($textfacturautf, 76, 82));
$pdf->SetXY(10, $y + 146);
$pdf->Cell(10, 10, substr($textfacturautf, 158, 80));

$pdf->Output();
