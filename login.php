<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $contraseña = $_POST['password'];

        $queryC = "SELECT id, email, password FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($conexion, $queryC);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $correo = $fila["email"];
            $psw = $fila["password"];

            if ($email == $correo && $contraseña == $psw) {
              if($email == "admin"){
              header("Location: paginaAdmin.php");
                exit();
              }
              else{
                header("Location: personal.php");
                exit();
              }
            } else {
                echo "La contraseña no es correcta";
            }
        } else {
            echo "No existe este usuario";
        }
    } else {
        echo "Debe ingresar su usuario y contraseña";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Estilos/style.css">
    <style>
      body {
        background-color: #779ECB;
      }

    </style>
  </head>
  <body>
    <?php require 'Parciales/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesion</h1>
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
    <form action="login.php" method="post">
      <input name="email" type="text" placeholder="Ingrese su usuario">
      <input name="password" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Submit">
    </form>
    <span class="white-shadow"> <strong>¿No tienes cuenta? Comunicate con el administrador</strong></span>
  </body>
</html>
