<?php
  require 'database.php';

  $message = '';
  
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $contraseña = $_POST['password'];
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$contraseña')";
    if ($conexion->query($sql) === TRUE) {
      $message = 'Nuevo usuario creado con éxito';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Estilos/style.css">
    <style>
          
        body {
          background-image: url('imagen11.jpg');
          background-repeat: no-repeat;
          background-size: cover;
        }

        .white-shadow {
          text-shadow: 0 0 5px #fff;
        }
    </style>
    </style>
  </head>
  <body>
    <?php require 'Parciales/header.php'; ?>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <h1>Registrar usuario</h1>
    <form action="signup.php" method="post">
      <input name="email" type="text" placeholder="Ingrese el nombre de usuario">
      <input name="password" type="password" placeholder="Cree una contraseña">
      <input name="confirm_password" type="password" placeholder="Confirme su contraseña">
      <input type="submit" value="Submit">
    </form>
    <span> <a href="paginaAdmin.php">Regresar</a></span>
  </body>
</html>
