<?php
  require 'database.php';
  // Realizar consulta
  $queryC = "SELECT id_carro, id_tarjeta, fecha, hora_entrada, fecha_salida, hora_salida, tarifa, horas_estancia, total FROM carro  WHERE total=0";
  $result = mysqli_query($conexion, $queryC);

  $queryT = "SELECT numero_tarjeta FROM tarjeta_electronica";
  $resultado = mysqli_query($conexion, $queryT);
  $registro = mysqli_fetch_assoc($resultado);
  $numeroTarjeta = $registro['numero_tarjeta'];

?>

<!DOCTYPE html>
<html>
  <head>
    <title>PERSONAL</title>
    <style>
      body {
        background-color: #a7a7a7;
      }

      h1 {
        font-size: 50px;
        text-align: center;
        color: #000000;
        margin-top: 50px;
      }

      .edit-button {
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 30px 30px;
        border-radius: 3px;
        position: absolute;
        top: 150px;
        right: 350px;
      }
      .edit-button2 {
        background-color:  #000000;
        color: #9DFF0E;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        position: absolute;
        top: 100px;
        right: 50px;
      }

      .recuadro {
        background-color: #666666;
        width: 600px;
        height: 500px;
        position: absolute;
        top: 150px;
        left: 200px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #888888;
      }

      .recuadro2 {
        background-color: #666666;
        width: 350px;
        height: 300px;
        position: absolute;
        top: 300px;
        right: 300px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #888888;
      }

      .recuadro3 {
        background-color: #666666;
        width: 350px;
        height: 130px;
        position: absolute;
        top: 150px;
        right: 300px;
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
      h3 {
        font-size: 30px;
        text-align: center;
        color: #000000;
        margin-top: 10px;
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
      .edit-button3 {
        background-color:  #000000;
        color: #9DFF0E;
        border: none;
        padding: 25px 65px;
        border-radius: 3px;
        position: absolute;
        top: 180px;
        right: 90px;
      }
      
      .edit-button4 {
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 450px;
        right: 180px;
      }

       /* Estilos para la barra de menú */
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #000000;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
      }

      li {
        float: left;
      }

      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      /* Cambia el color del enlace cuando se pasa el cursor por encima */
      li a:hover {
        background-color: #555555;
      }

    </style>
  </head>
  <body>
    <h1>PERSONAL</h1>
    <div class="sidebar">
    <ul>
      <li><a href="agregarCocheP.php">Agregar coche manualmente</a></li>
      <li><a href="reportesPersonal.php">Generar reportes</a></li>
      <li><a href="index.php">Cerrar sesión</a></li>
    </ul>
        </div>
       <div class="recuadro">
        <h2 class="titulo-recuadro">CONSULTA LOS COCHES ACTIVOS</h2>
        <button onclick="location.reload()" class="edit-button4">Actualizar tabla</button>

        <div class="tabla-container"> <!-- Contenedor de la tabla con barras de desplazamiento -->
    <table>

      <style>
          /* Estilo para el contenedor de la tabla */
      .tabla-container {
        overflow: auto; /* Habilita las barras de desplazamiento según sea necesario */
        max-height: 400px; /* Establece la altura máxima del contenedor para mostrar las barras de desplazamiento */
      }
      
      /* Estilo para la tabla */
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
      }
      
      th {
        background-color: #B5B2B2;
        color: white;
      }
          
        </style>
        
    <tr>
      <th>ID CARRO</th>
      <th>ID TARJETA ELECTRONICA</th>
      <th>FECHA DE ENTRADA</th>
      <th>HORA DE ENTRADA</th>
      <th>FECHA DE SALIDA</th>
      <th>HORA DE SALIDA</th>
      <th>TARIFA</th>
      <th>HORAS DE ESTANCIA</th>
      <th>PAGO TOTAL</th>
     
    </tr>
    <?php
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id_carro"] . "</td>";
          echo "<td>" . $row["id_tarjeta"] . "</td>";
          echo "<td>" . $row["fecha"] . "</td>";
          echo "<td>" . $row["hora_entrada"] . "</td>";
          echo "<td>" . $row["fecha_salida"] . "</td>";
          echo "<td>" . $row["hora_salida"] . "</td>";
          echo "<td>" . $row["tarifa"] . "</td>";
          echo "<td>" . $row["horas_estancia"] . "</td>";
          echo "<td>" . $row["total"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "No hay ningun coche en el estacionamiento";
      }
    ?>
  </table>
  </div>
    </div>
    <div class="recuadro2">
        <h2 class="titulo-recuadro">COBRO</h2>
            <h3>PRESIONA EL BOTÓN PARA COBRAR</h3>
            <form action="cobrarP.php" method="POST">
                <button type="submit" class="edit-button3" onclick="enviarDatos()">Cobrar</button>
           </form>
    </div>
    <div class="recuadro3">
    <h2 onclick="location.reload()" class="titulo-recuadro">NÚMERO DE TARJETA ELECTRONICA</h2>
    <?php if (isset($mensajeError)) { ?>
        <p style="color: red;"><?php echo $mensajeError; ?></p>
    <?php } else { ?>
        <p style="font-size: 25px; text-align: center; font-weight: bold;"><?php echo $numeroTarjeta; ?></p>
    <?php } ?>
</div>

  </body>
  
</html>
