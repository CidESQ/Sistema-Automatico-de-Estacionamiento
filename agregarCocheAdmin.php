<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar la fecha y hora del formulario
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $Id_tarjeta = $_POST['id_tarjetaE'];

    // Concatenar la fecha y hora en el formato deseado
    $fechaHora = $fecha . ' ' . $hora;

    // Obtener el próximo ID
    $query = "SELECT MAX(id_carro) AS max_id FROM carro";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    $ultimoID = $row['max_id'];
    $nuevoID = $ultimoID + 1;

    // Realizar el registro en la base de datos con el nuevo ID
    $query = "INSERT INTO carro (id_carro, id_tarjeta, fecha, hora_entrada, fecha_salida, hora_salida, tarifa, horas_estancia, total) VALUES ('$nuevoID','$Id_tarjeta', '$fecha', '$hora',NULL,NULL,0,0,0 )";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Mostrar el nuevo ID registrado
        echo "<script>alert('Coche registrado con exito');</script>";
    } else {
        // Error en el registro
        echo "<script>alert('Error al registrar el coche');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>AGREGAR COCHE</title>
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
        background-color: #000000;
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
        height: 550px;
        position: absolute;
        top: 130px;
        left: 460px;
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
        background-color: #000000;
        color:  #9DFF0E;
        border: none;
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 250px;
        right: 90px;
      }
      
      .edit-button4 {
        background-color: blue;
        color: white;
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
      /*todo lo de fecha y hora*/
  
    input[type="date"] {
			padding: 20px;
			border-radius: 50px;
			border: none;
      position: absolute;
      top: 250px;
      left: 200px;
			background-color: #fff;
			font-size: 24px;
			color: #333;
			margin-bottom: 30px;
			box-shadow: 0 30px 20px rgba(0,0,0,0.2);
  
			}
      input[type="time"] {
			padding: 20px;
			border-radius: 50px;
			border: none;
      position: absolute;
      top: 350px;
      left: 200px;
			background-color: #fff;
			font-size: 24px;
			color: #333;
			margin-bottom: 30px;
			box-shadow: 0 30px 20px rgba(0,0,0,0.2);
  
  
			}
      input[type="submit"] {
			padding: 15px;
			border-radius: 50px;
			border: none;
      position: absolute;
      top: 450px;
      left: 235px;
			background-color: #000000;
			color: #9DFF0E;
			font-size: 30px;
			cursor: pointer;
			box-shadow: 0 10px 20px rgba(0,0,0,0.2);
		
		}

		input[type="submit"]:hover {
			background-color: #333;
			color: #fff;
		
		}

    h4 {
        font-size: 20px;
        text-align: center;
        position: absolute;
        top: 265px;
        left: 15px;
        color: #000000;
        margin-top: 10px;
      }

      h5 {
        font-size: 20px;
        text-align: center;
        position: absolute;
        top: 365px;
        left: 15px;
        color: #000000;
        margin-top: 10px;
      }

    </style>
  </head>
  <body>
    <h1>AGREGAR COCHE</h1>
    <div class="sidebar"></div>
    <ul>
      <li><a href="signup.php">Agregar nuevo usuario</a></li>
      <li><a href="agregarCoche.php">Agregar coche manualmente</a></li>
      <li><a href="#about">Generar reportes</a></li>
      <li><a href="empleados.php">Empleados y Administradores</a></li>
      <li><a href="index.php">Cerrar sesión</a></li>
    </ul>
        </div>
    <div class="recuadro">
        <h2 class="titulo-recuadro">REGISTRA LA ENTRADA DE UN NUEVO AUTOMOVIL</h2>
        <h3 class="h3">Ingresa los datos que se piden</h3>
        <form action="#" method="POST">
        <input type="text" name="id_tarjetaE" placeholder="Ingresa el id de la tarjeta electronica aqui">
          <h4 class ="h4" for="fecha">Selecciona la fecha:</h4>
          <input type="date" id="fecha" name="fecha">
          <h5 class ="h5" for="hora">Selecciona la hora:</h5>
          <input type="time" id="hora" name="hora">
          <input type="submit" value="Registrar">
	      </form>
    </div>
  </form>
    </div>
    <a class="edit-button2" href="paginaAdmin.php">REGRESAR</a>
  </body>
</html>
