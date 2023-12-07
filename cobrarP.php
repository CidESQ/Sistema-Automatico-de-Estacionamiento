<?php
 require 'database.php';

//Obteniendo la tarjeta del sensor
$queryTarjeta = "SELECT numero_tarjeta FROM tarjeta_electronica WHERE 1";
$resultadoT = mysqli_query($conexion, $queryTarjeta);
$numero =  mysqli_fetch_assoc($resultadoT);
$numero_tarjeta = $numero['numero_tarjeta'];

//Obteniendo el codigo unico del auto

//Obteniendo el id unico de acuerdo a la tarjeta de acuerdo al sensor
$queryIdUnico = "SELECT id_carro FROM carro WHERE id_tarjeta = $numero_tarjeta AND total = 0";
$resultadoId = mysqli_query($conexion, $queryIdUnico);
$id_unico = mysqli_fetch_assoc($resultadoId); 
$idunicoF = $id_unico['id_carro'];

//$id_carro = $_POST['id_tarjeta'];
$query = "SELECT fecha, hora_entrada, tarifa FROM carro WHERE id_carro = $idunicoF";
$resultado = mysqli_query($conexion, $query);
$registro = mysqli_fetch_assoc($resultado);
$fecha = $registro['fecha'];
$hora_entrada = $registro['hora_entrada'];

//Obteniendo la tarifa
$queryT = "SELECT valor_tarifa FROM tarifa WHERE id_tarifa = 1";
$resultadoT = mysqli_query($conexion, $queryT);
$registro = mysqli_fetch_assoc($resultadoT);
$tarifa = $registro['valor_tarifa'];

// Calcular la hora actual y la hora de estancia
date_default_timezone_set("America/Mexico_City");
$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i:s');
$estancia_segundos = strtotime("$fecha_actual $hora_actual") - strtotime("$fecha $hora_entrada");
$horas_completas = floor($estancia_segundos / 3600);
$minutos_restantes = ($estancia_segundos % 3600) / 60;
$dias_completos = floor($horas_completas / 24);
$horas_completas %= 24;

// Calcular el total a pagar
$total_pagar = ($dias_completos * 24 + $horas_completas + ($minutos_restantes > 0 ? 1 : 0)) * $tarifa;

// Calcular la duración de la estancia en días y horas
$horas_completasF = ceil($estancia_segundos / 3600);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$id_carro = $_POST['id_tarjeta'];
    $hora_salida = date('H:i:s'); 
    $fecha_salida = date('Y-m-d');
    $query2 = "UPDATE carro SET  fecha_salida = '$fecha_salida', hora_salida = '$hora_salida', tarifa =$tarifa, total = $total_pagar, horas_estancia = $horas_completasF WHERE id_carro = $idunicoF";
    $resultado2 = mysqli_query($conexion, $query2);
    if (!$resultado2) {
        echo "<script>alert('Error al actualizar los datos de cobro');</script>";
    }
    else{
        echo "<script>alert('Cobro registrado exitosamente');</script>";
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>COBRAR_PERSONAL</title>
    <style>
      body {
        background-color: #a7a7a7;
      }

      h1 {
        font-size: 48px;
        text-align: center;
        color: #000000;
        margin-top: 50px;
      }

      .edit-button {
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        position: absolute;
        top: 100px;
        right: 50px;
      }
      .edit-button2 {
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 20px 40px;
        border-radius: 3px;
        position: absolute;
        top: 250px;
        right: 180px;
      }

      .recuadro {
        background-color: #666666;
        width: 500px;
        height: 350px;
        position: absolute;
        top: 150px;
        right: 520px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #888888;
      }

      .titulo-recuadro {
        font-size: 30px;
        text-align: center;
        color: #9DFF0E;
        background-color: #000000;
        margin-top: 0;
        border-radius: 5px 5px 0 0;
      }

      input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border-radius: 5px;
        border: 2px solid #ccc;
        font-size: 18px;
      }

    </style>
  </head>
  <body>
    <h1>COBRO</h1>
    <form action="cobrarP.php" method="post">
    <div class="recuadro">
      <h2 class="titulo-recuadro">DATOS DE COBRO</h2>
      <?php if (isset($mensajeError)) { ?>
      <p style="color: red;"><?php echo $mensajeError; ?></p>
     <?php } else { ?>
      <p>El número de la tarjeta electronica saliente es: <?php echo $numero_tarjeta; ?></p>
      <p>La fecha de entrada es: <?php echo $fecha; ?></p>
      <p>La hora de entrada es: <?php echo $hora_entrada; ?></p>
      <p>La fecha de salida es: <?php echo $fecha_actual; ?></p>
      <p>La hora de salida es: <?php echo $hora_actual; ?></p>
      <p>La duración de la estancia es: <?php echo $horas_completasF; ?> horas.</p>
      <p>La tarifa por hora es: $<?php echo $tarifa; ?></p>
      <p>El total a pagar es: $<?php echo $total_pagar; ?></p>
    <?php } ?>
    <form action="cobrarP.php" method="post">
   
    </form>
    </div>
    </form>
    <a class="edit-button" href="personal.php">Regresar</a>

  </body>
</html>
