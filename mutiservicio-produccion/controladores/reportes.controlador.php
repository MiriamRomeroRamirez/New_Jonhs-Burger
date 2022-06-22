<?php

class ControladorReportes
{

    /*=============================================
    DESCARGAR REPORTE EN EXCEL
    =============================================*/

    public function ctrDescargarReporte()
    {

        if (isset($_GET["reporte"])) {

            $tabla = $_GET["reporte"];

            $reporte = ModeloReportes::mdlDescargarReporte($tabla);

            /*=============================================
            CREAMOS EL ARCHIVO DE EXCEL
            =============================================*/

            $nombre = $_GET["reporte"] . '.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: ' . date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="' . $nombre . '"');
            header("Content-Transfer-Encoding: binary");

            /*=============================================
            REPORTE VENTAS
            =============================================*/

            if ($_GET["reporte"] == "proveedor") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>APELLIDOS</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TIENDA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DIRECCION WEB</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DOCUMENTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TIPO PERSONA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TELEFONO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>COD PROVEEDOR</td>
							<td style='font-weight:bold; border:1px solid #eee;'>RUC</td>
							<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>

						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/
                    /*$item  = "id";
                    $valor = $value["id_producto"];

                    $traerProducto = ControladorProductos::ctrMostrarProductos($item, $valor);*/

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombre"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["apellidos"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["tienda"] . "</td>
                    	          <td style='border:1px solid #eee;'>" . $value["direccion_web"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["tipo_persona"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["documento"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["telefono"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["cod_proveedor"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["ruc"] . "</td>
			 					  	   <td style='border:1px solid #eee;'>" . $value["email"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

            if ($_GET["reporte"] == "cliente") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>APELLIDOS</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NRO DOCUMENTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DIRECCION</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TELEFONO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>

						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/
                    /*$item  = "id";
                    $valor = $value["id_producto"];

                    $traerProducto = ControladorProductos::ctrMostrarProductos($item, $valor);*/

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombre"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["apellidos"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["documento"] . "</td>
                    	          <td style='border:1px solid #eee;'>" . $value["direccion"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["telefono"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>
			 					  	   <td style='border:1px solid #eee;'>" . $value["email"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

            /*=============================================
            REPORTE COMPRAS
            =============================================*/

            if ($_GET["reporte"] == "compras") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>COD_COMPRA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>PROVEEDOR</td>
							<td style='font-weight:bold; border:1px solid #eee;'>COMPROBANTE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NUM DOCUMENTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TOTAL S./</td>
							<td style='font-weight:bold; border:1px solid #eee;'>MONEDA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>


						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/
                    $item  = "id";
                    $valor = $value["id_proveedor"];

                    $proveedor = ControladorProveedor::ctrMostrarProveedorInfo($item, $valor);

                    if ($value["estado"] == 1) {
                        $estado = "Aceptado";
                    } else {
                        $estado = "Anulado";
                    }

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $proveedor["nombre"] . " " . $proveedor["apellidos"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["comprobante"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["impuesto"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["serie"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["num_doc"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["total"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["moneda"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $estado . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

            /*=============================================
            REPORTE VENTAS
            =============================================*/

            if ($_GET["reporte"] == "ventas") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>COD_VENTA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>COMPROBANTE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NUM DOCUMENTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TOTAL S./</td>
							<td style='font-weight:bold; border:1px solid #eee;'>MONEDA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>


						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER CLIENTE
                    =============================================*/
                    $item  = "id";
                    $valor = $value["id_cliente"];

                    $proveedor = ControladorCliente::ctrMostrarClienteInfo($item, $valor);

                    if ($value["estado"] == 1) {
                        $estado = "Aceptado";
                    } else {
                        $estado = "Anulado";
                    }

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $proveedor["nombre"] . " " . $proveedor["apellidos"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["comprobante"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["impuesto"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["serie"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["num_doc"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["total"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["moneda"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $estado . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

            if ($_GET["reporte"] == "compras") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>COD_COMPRA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>PROVEEDOR</td>
							<td style='font-weight:bold; border:1px solid #eee;'>COMPROBANTE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>SERIE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NUM DOCUMENTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TOTAL S./</td>
							<td style='font-weight:bold; border:1px solid #eee;'>MONEDA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>


						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/
                    $item  = "id";
                    $valor = $value["id_proveedor"];

                    $proveedor = ControladorProveedor::ctrMostrarProveedorInfo($item, $valor);

                    if ($value["estado"] == 1) {
                        $estado = "Aceptado";
                    } else {
                        $estado = "Anulado";
                    }

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $proveedor["nombre"] . " " . $proveedor["apellidos"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["comprobante"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["impuesto"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["serie"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["num_doc"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["total"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["moneda"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $estado . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

            if ($_GET["reporte"] == "productos") {

                echo utf8_decode("

					<table border='0'>

						<tr>

							<td style='font-weight:bold; border:1px solid #eee;'>COD_PRODUCTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DETALLES</td>
							<td style='font-weight:bold; border:1px solid #eee;'>CLASIFICACION</td>
							<td style='font-weight:bold; border:1px solid #eee;'>PRECIO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>VENTAS </td>
							<td style='font-weight:bold; border:1px solid #eee;'>COMPRAS</td>



						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/

                    if ($value["clasificacion"] == "maquinas") {
                        $item  = "id";
                        $valor = $value["id_maquinas"];

                        $maquinas = ControladorMaquina::ctrMostrarMaquinaInfo($item, $valor);
                        $nombre   = $maquinas["nombre"];
                        $detalles = $maquinas["detalles"];
                    } else if ($value["clasificacion"] == "repuestos") {
                        $item  = "id";
                        $valor = $value["id_repuestos"];

                        $repuestos = ControladorRepuesto::ctrMostrarRepuestoInfo($item, $valor);
                        $nombre    = $repuestos["nombre"];
                        $detalles  = $repuestos["detalles"];

                    } else if ($value["clasificacion"] == "otros") {
                        $item  = "id";
                        $valor = $value["id_otros"];

                        $otros = ControladorOtros::ctrMostrarOtrosInfo($item, $valor);

                        $nombre   = $otros["nombre"];
                        $detalles = $otros["modelo"];
                    }

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $nombre . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $detalles . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["clasificacion"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["precio"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["cantidad"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["ventas"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["compras"] . "</td>
			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }

        }

    }

}
