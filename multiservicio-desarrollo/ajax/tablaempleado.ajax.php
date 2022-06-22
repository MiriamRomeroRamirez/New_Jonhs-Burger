<?php

require_once "../controladores/empleado.controlador.php";
require_once "../modelos/empleado.modelo.php";
require_once "../modelos/rutas.php";

class TablaEmpleado{

  /*=============================================
    MOSTRAR LA TABLA DE EMPLEADO
    =============================================*/ 

  public function mostrarTabla(){ 

    $item = null;
    $valor = null;

                                     
    $empleado = ControladorEmpleado::ctrMostrarEmpleado($item, $valor);

    $url = Ruta::ctrRuta();

    if(count($empleado) == 0){

        $datosJson = '{ "data":[]}';

        echo $datosJson;

        return;

      }

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($empleado); $i++){

      /*=============================================
      TRAER FOTO USUARIO
      =============================================*/

      if($empleado[$i]["foto"] != ""){

        $foto = "<img class='img-circle' src='".$url.$empleado[$i]["foto"]."' width='60px'>";

      }else{

        $foto = "<img class='img-circle' src='vistas/img/empleado/default/anonymous.png' width='60px'>";
      }

      /*=============================================
        REVISAR ESTADO
        =============================================*/

           if($empleado[$i]["estado"] != 0){

                $estado = "<td><button class='btn btn-success btn-xs btnActivar' idEmpleado='".$empleado[$i]["id"]."' estadoEmpleado='0' id='btnActivar'>Activado</button></td>";

              }else{

                    $estado= "<td><button class='btn btn-danger btn-xs btnActivar' idEmpleado='".$empleado[$i]["id"]."' estadoEmpleado='1'>Desactivado</button></td>";

            } 

          $acciones= "<div class='btn-group'><button class='btn btn-warning btnEditarEmpleado' idEmpleado='".$empleado[$i]["id"]."'  data-toggle='modal' data-target='#modalEditarEmpleado'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarEmpleado' idEmpleado='".$empleado[$i]["id"]."' fotoEmpleado='".$empleado[$i]["foto"]."'><i class='fa fa-times'></i></button></div>";

        


      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/

      $datosJson   .= '[
              "'.($i+1).'",
              "'.$empleado[$i]["nombre"].' '.$empleado[$i]["apellidos"].'",
              "'.$foto.'",
              "'.$empleado[$i]["documento"].'",
              "'.$empleado[$i]["direccion"].'",
              "'.$empleado[$i]["telefono"].'",
              "'.$empleado[$i]["cargo"].'",
              "'.$estado.'",
              "'.$empleado[$i]["email"].'",
              "'.$acciones.'"
            ],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new TablaEmpleado();
$activar -> mostrarTabla();
