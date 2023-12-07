<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido al sistema automatizado de estacionamiento</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Estilos/style.css">
}
<style>
        .container2 {
          display: flex;
          flex-wrap: wrap;
        }

        .sidebar {
          height: 85px; /* altura deseada */
          width: 100%;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #f1f1f1;
          overflow-x: hidden;
          display: flex;
          justify-content: flex-end; /* Cambio a flex-end */
          align-items: center;
        }

        .sidebar ul {
          list-style: none;
          margin: 0;
          padding: 0;
        }

        .sidebar li {
          margin: 0;
          padding: 0;
        }

        .sidebar a {
          display: block;
          padding: 6px 8px;
          text-decoration: none;
          font-size: 20px;
          color: #000;
        }

        .sidebar a:hover {
          background-color: #555;
          color: white;
        }

        .content {
          margin-top: 60px; /* altura de la barra */
          margin-left: 200px;
          padding: 1px 16px;
          height: 1000px; /* Aquí puedes ajustar la altura del contenido */
        }

      

        a {
          font-family: 'Roboto', sans-serif;
          font-size: 20px;
        }

        .white-shadow {
          text-shadow: 0 0 5px #fff;
        }
    </style>
  </head>
  <body>
  
    <?php require 'Parciales/header.php' ?>
    <div class="sidebar">
      <ul>
      <a href="login.php">Iniciar sesión</a>
      </ul>
    </div>
        
    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
     
      <h1 class="white-shadow"><strong>BIENVENIDO AL SISTEMA AUTOMATIZADO DE ESTACIONAMIENTO</strong></h1>
      <style>
		body {
			background-image: url('imagen11.jpg');
			background-repeat: no-repeat;
      background-size: cover;
		}
	</style>
     
      <?php endif; ?>
  </body>
</html>