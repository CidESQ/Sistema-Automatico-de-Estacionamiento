<?php
  require 'database.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la nueva tarifa del formulario
    $nuevaTarifa = $_POST['nueva_tarifa'];

    // Actualizar la tarifa en la base de datos
    //Fecha actual
    $fecha_actual = date('Y-m-d H:i:s');
    $query = "UPDATE tarifa SET valor_tarifa = $nuevaTarifa, fecha_tarifa = '$fecha_actual' WHERE id_tarifa = 1";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Mensaje de confirmación si la actualización se realizó correctamente
        echo "<script>alert('Tarifa actualizada con exito');</script>";
      } else {
        // Mensaje de error si la actualización falló
        echo "<script>alert('No fue posible actualizar la tarifa');</script>";
      }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>NUEVA TARIFA</title>
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
        top: 200px;
        right: 180px;
      }

      .recuadro {
        background-color: #666666;
        width: 500px;
        height: 350px;
        position: absolute;
        top: 150px;
        right: 525px;
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
    <h1>ADMINISTRADOR</h1>
    <div class="sidebar">
    <ul>
      <li><a href="signup.php">Agregar nuevo usuario</a></li>
      <li><a href="#about">Agregar coche manualmente</a></li>
      <li><a href="editarTarifa.php">Cambiar la tarifa de cobro</a></li>
      <li><a href="#about">Generar reportes</a></li>
      <li><a href="empleados.php">Empleados y Administradores</a></li>
      <li><a href="index.php">Cerrar sesión</a></li>
    </ul>
        </div>
    <div class="recuadro">
      <h2 class="titulo-recuadro">NUEVA TARIFA</h2>
      <form method="post">
        <input type="text" name="nueva_tarifa" placeholder="Ingresa la nueva tarifa aquí">
        <button type="submit"class="edit-button2">Guardar</button>
      </form>
    </div>
    <a class="edit-button" href="paginaAdmin.php">Regresar</a>
  </body>
</html>
