<?php
  require 'database.php';
  // Realizar consulta
  $queryC = "SELECT * FROM usuarios";
  $result = mysqli_query($conexion, $queryC);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];

    //Borrar usuario
    $query = "DELETE FROM usuarios WHERE id = '$id_usuario'";
    $result2 = mysqli_query($conexion, $query);

    if ($result2) {
        echo "<script>alert('Usuario eliminado con exito');</script>";
       
      } else {
        echo "<script>alert('No fue posible eliminar el usuario');</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>EMPLEADOS Y ADMINISTRAD0RES</title>
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
        background-color: #779ECB;
        color: white;
        border: none;
        padding: 30px 30px;
        border-radius: 3px;
        position: absolute;
        top: 150px;
        right: 350px;
      }
      .edit-button2 {
        background-color: blue;
        color: white;
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
        height: 350px;
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
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 250px;
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
      .edit-buttonF {
        background-color: #000000;
        color: #9DFF0E;
        border: none;
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 550px;
        right: 360px;
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
    <h1>EMPLEADOS Y ADMINISTRADORES</h1>
    <div class="sidebar">
    <ul>
      <li><a href="signup.php">Agregar nuevo usuario</a></li>
      <li><a href="#about">Agregar coche manualmente</a></li>
      <li><a href="#about">Generar reportes</a></li>
      <li><a href="empleados.php">Empleados y Administradores</a></li>
      <li><a href="index.php">Cerrar sesión</a></li>
    </ul>
        </div>
    <div class="recuadro">
        <h2 class="titulo-recuadro">CONSULTA LOS USUARIOS REGISTRADOS</h2>
        <button onclick="location.reload()" class="edit-button4">Actualizar tabla</button>

    <table>
    <style>
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
			background-color:#B5B2B2;
			color: white;
		}
	</style>
    <tr>
      <th>ID DEL USUARIO</th>
      <th>NOMBRE DEL USUARIO</th>
      <th>CONTRASEÑA</th>
      
     
    </tr>
    <?php
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["password"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "No hay ningun usuario";
      }
    ?>
  </table>
    </div>
    <div class="recuadro2">
        <h2 class="titulo-recuadro">ELIMINAR USUARIO</h2>
            <h3>INGRESA EL ID DEL USUARIO</h3>
    <form method="post">
    <input type="text" name="id_usuario" placeholder="Ingresa el id aquí">
    <button type="submit" class="edit-button3">ELIMINAR</button>
  </form>
    </div>
    <a class="edit-buttonF" href="paginaAdmin.php">REGRESAR</a>
  </body>
</html>
