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

$idventa = $_GET['idticket'];
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
static $textboleta;
static $direccion1;
static $serie;
static $numero;

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
$pdf->Cell(100, 10, 'BOLETA ELECTRONICA  ' . $numero . '-' . $serie);

$pdf->SetFont('Arial', '', 16);
$pdf->SetXY(15, 52);
$pdf->Cell(40, 10, 'FECHA EMISION: ' . $fecha);

$pdf->SetXY(120, 52);
$pdf->Cell(40, 10, 'DOCUMENTO: ' . $ruc);

$pdf->SetXY(15, 59);
$pdf->Cell(10, 10, substr('NOMBRE: ' . $cliente, 0, 40));
$pdf->SetXY(45, 65);
$pdf->Cell(60, 10, substr($cliente, 40, 40));

$pdf->SetFont('Arial', 'B', 13);
$pdf->SetXY(10, 68);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

$pdf->SetXY(10, 71);
$pdf->Cell(40, 12, 'COD');
$pdf->SetXY(45, 71);
$pdf->Cell(40, 12, 'DESCRIPCION');
$pdf->SetXY(118, 71);
$pdf->Cell(40, 12, 'CANT');
$pdf->SetXY(137, 71);
$pdf->Cell(40, 12, 'P.UNIDAD');
$pdf->SetXY(170, 71);
$pdf->Cell(40, 12, 'IMPORTE');

$pdf->SetXY(10, 75);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

/*$con1 = new Conexion();
$sql1 = "SELECT  transaccion.tran_cantidad as cantidad,transaccion.tran_preciou as preciou, transaccion.tran_importe importe,producto.prod_descripcion as descripcion, transaccion.cod_transaccion as cod_transaccion FROM transaccion INNER JOIN producto on transaccion.cod_facturacion=producto.cod_producto  WHERE transaccion.cod_facturacion='$id'";
mysqli_set_charset($con1, "utf8");
$result = mysqli_query($con1, $sql1);
$y      = 83;
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
$con1->close();*/

$item  = "idventas";
$valor = $idventa;

$detalles = ControladorVentas::ctrMostrarDetallesVentasInfo($item, $valor);
$y        = 83;
foreach ($detalles as $key => $row) {

    $pdf->SetXY(10, $y);
    $pdf->Cell(20, 6, $row['idproductos']);
    $pdf->SetXY(30, $y);
    $pdf->Cell(80, 6, utf8_decode(substr($row['titulo'], 0, 31)));
    $pdf->SetXY(123, $y);
    $pdf->Cell(20, 6, utf8_decode($row['cantidad']));
    $pdf->SetXY(138, $y);
    $pdf->Cell(30, 6, utf8_decode($row['precio']));
    $pdf->SetXY(170, $y);
    $pdf->Cell(30, 6, utf8_decode($row['subtotal']));
    if (strlen(utf8_decode($row['titulo'])) >= 31) {
        $y = $y + 7;
        $pdf->SetXY(28, $y);
        $pdf->Cell(70, 6, utf8_decode(substr($row['titulo'], 31, 40)));

    }
    $y = $y + 7;
}

$pdf->SetXY(10, $y + 0);
$pdf->Cell(40, 10, '----------------------------------------------------------------------------------------------------------------------------');

$pdf->SetFont('Arial', '', 16);
$pdf->SetXY(110, $y + 6);
$pdf->Cell(10, 10, 'TOTAL A PAGAR: S./ ' . $total);

$pdf->SetXY(10, $y + 12);
$pdf->Cell(40, 10, '-----------------------------------------------------------------------------------------------------');

$pdf->SetXY(110, $y + 19);
$pdf->Cell(10, 10, 'EXONERADAS: S./ ' . $exonerado);

$pdf->SetXY(110, $y + 27);
$pdf->Cell(10, 10, 'GRAVADAS: S./ ' . $gravado);

$pdf->SetXY(110, $y + 35);
$pdf->Cell(10, 10, 'IMPORTE TOTAL: S./ ' . $total);

$pdf->SetXY(10, $y + 40);
$pdf->Cell(40, 10, '-----------------------------------------------------------------------------------------------------');

$pdf->SetXY(110, $y + 48);
$pdf->Cell(10, 10, 'EFECTIVO:' . $efectivo);

$pdf->SetXY(110, $y + 57);
$pdf->Cell(10, 10, 'TARJETA:');

$pdf->SetXY(10, $y + 66);
$pdf->Cell(0, 6, 'SON: ' . num2letras($total));

$pdf->Image($img, 80, $y + 71, -100);
$textboletautf = utf8_decode($textboleta);
$pdf->SetFont('Arial', '', 14);
$pdf->SetXY(10, $y + 135);
$pdf->Cell(10, 10, substr($textboletautf, 0, 74));
$pdf->SetXY(10, $y + 140);
$pdf->Cell(10, 10, substr($textboletautf, 74, 80));
$pdf->SetXY(10, $y + 146);
$pdf->Cell(10, 10, substr($textboletautf, 152, 80));

$pdf->Output();
