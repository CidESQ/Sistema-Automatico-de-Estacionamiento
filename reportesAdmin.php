<?php
  require 'database.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN-REPORTES</title>
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
        height: 350px;
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
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 250px;
        right: 90px;
      }
      .edit-button33 {
        background-color:  #000000;
        color: #9DFF0E;
        border: none;
        padding: 15px 60px;
        border-radius: 3px;
        position: absolute;
        top: 345px;
        right: 150px;
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

      /* Estilos para la barra de menú principal */
      ul.menu-principal {
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

      ul.menu-principal li {
        float: left;
      }

      ul.menu-principal li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      ul.menu-principal li a:hover {
        background-color: #555555;
      }

      /* Estilos para la barra de menú vertical */
      .vertical-sidebar {
        background-color: #515151;
        position: fixed;
        top: 45px;
        left: 0;
        width: 130px;
        height: 100%;
        z-index: 1;
      }

      .vertical-sidebar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      .vertical-sidebar li {
        margin-bottom: 10px;
      }

      .vertical-sidebar li a {
        display: block;
        color: white;
        padding: 10px 16px;
        text-decoration: none;
      }

      .vertical-sidebar li a:hover {
        background-color: #555555;
      }
      
      #pdfContainer {
      position: absolute;
      top: 150px;
      left: 140px;
      width: 90%;
      height: 600px;
      border: 1px solid #ccc;
    }

    .popup {
      background-color: #666666;
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 350px;
      height: 300px;      
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 2px 2px 5px #888888;
      padding: 20px;
    }
    
    .custom-select {
      position: absolute;
      top: 170px;
      right: 100px;
      display: inline-block;
      font-size: 16px;
      font-family: Arial, sans-serif;
      color: #333;
    }

    .custom-select select {
      width: 200px;
      height: 40px;
      padding: 10px;
      border: none;
      background-color: #f2f2f2;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-select select:focus {
      outline: none;
      border-color: #5b9dd9;
      box-shadow: 0 0 0 2px rgba(91, 157, 217, 0.2);
    }

    .custom-select::after {
      content: "\25BE";
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      font-size: 18px;
      color: #666;
      transition: color 0.3s ease;
    }

    .custom-select:hover::after {
      color: #ff0000; /* Cambiar a un color llamativo */
    }

    .custom-select select option {
      padding: 10px;
      transition: background-color 0.3s ease;
    }

    .custom-select select option:hover {
      background-color: #e6e6e6;
      color: #ff0000; /* Cambiar a un color llamativo */
    }

    .custom-select select option:checked {
      background-color: #5b9dd9;
      color: #fff;
    }

    .custom-select.open::after {
      transform: translateY(-50%) rotate(180deg);
    }

    .date-input {
      padding: 20px;
      border-radius: 50px;
      border: none;
      background-color: #fff;
      font-size: 24px;
      color: #333;
      margin-bottom: 30px;
      box-shadow: 0 30px 20px rgba(0,0,0,0.2);
    }

    .date-input.first {
      position: absolute;
      top: 150px;
      left: 230px;
    }

    .date-input.second {
      position: absolute;
      top: 250px;
      left: 230px;
    }

    .popup2 {
      background-color: #666666;
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 500px;
      height: 370px;      
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 2px 2px 5px #888888;
      padding: 20px;
    }

    h4 {
        font-size: 22px;
        text-align: center;
        position: absolute;
        top: 162px;
        left: 50px;
        color: #000000;
        margin-top: 10px;
      }

      h5 {
        font-size: 22px;
        text-align: center;
        position: absolute;
        top: 260px;
        left: 50px;
        color: #000000;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <h1>GENERADOR DE REPORTES</h1>

    <ul class="menu-principal">
      <li><a href="signup.php">Agregar nuevo usuario</a></li>
      <li><a href="agregarCocheAdmin.php">Agregar coche manualmente</a></li>
      <li><a href="editarTarifa.php">Cambiar la tarifa de cobro</a></li>
      <li><a href="reportesAdmin.php">Generar reportes</a></li>
      <li><a href="empleados.php">Empleados y Administradores</a></li>
      <li><a href="index.php">Cerrar sesión</a></li>
    </ul>

    <div class="vertical-sidebar">
      <ul>
      <li><a href="#" onclick="mostrarPDF('reporte1.php')">Reporte de todos los coches registrados en la base de datos</a></li>
      <li><a href="#" onclick="mostrarPDF('reporte2.php')">Reporte de todos los usuarios registrados en la base de datos</a></li>
      <li><a href="#" onclick="mostrarPDF('reporte3.php')">Reporte de las ganancias del dia</a></li>
      <li><a href="#" onclick="showMonthPrompt()">Reporte de las ganancias por mes en el año actual</a></li>
      <li><a href="#" onclick="showYearPrompt()">Reporte de las ganancias por año</a></li>
      <li><a href="#" onclick="showDatePrompt()">Reporte de las ganancias por fecha especifica</a></li>
      </ul>
    </div>
    
    <div id="pdfContainer"></div>

   

    <div class="popup" id="monthPopup">
  <h2 class="titulo-recuadro">GENERACIÓN DE REPORTE</h2>
  <h3>Selecciona el mes:</h3>
  <div class="custom-select">
    <select id="monthSelect">
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
  </div>
  <button class="edit-button3" onclick="generateMonthReport()">Generar Reporte</button>
</div>


<script>
  function showMonthPrompt() {
    var monthPopup = document.getElementById('monthPopup');
    monthPopup.style.display = 'block';
  }

  function generateMonthReport() {
    var monthSelect = document.getElementById('monthSelect');
    var selectedMonth = monthSelect.value;
    var monthName = monthSelect.options[monthSelect.selectedIndex].text; // Obtener el nombre del mes seleccionado
      var url = 'reporte4.php?month=' + selectedMonth + '&monthName=' + encodeURIComponent(monthName); // Agregar el nombre del mes como parámetro en la URL
      mostrarPDF(url);

    var monthPopup = document.getElementById('monthPopup');
    monthPopup.style.display = 'none';
  }
</script>

<div class="popup" id="yearPopup">
  <h2 class="titulo-recuadro">GENERACIÓN DE REPORTE</h2>
  <h3>Selecciona el año:</h3>
  <div class="custom-select">
  <select id="yearSelect">
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    <option value="2031">2031</option>
    <option value="2032">2032</option>
    <option value="2033">2033</option>
    <option value="2034">2034</option>
    <option value="2035">2035</option>
    <option value="2036">2036</option>
    <option value="2037">2037</option>
    <option value="2038">2038</option>
    <option value="2039">2039</option>
    <option value="2040">2040</option>
  </select>
  </div>
  <button class="edit-button3" onclick="generateYearReport()">Generar Reporte</button>
</div>
<script>
  function showYearPrompt() {
    var yearPopup = document.getElementById('yearPopup');
    yearPopup.style.display = 'block';
  }

  function generateYearReport() {
    var yearSelect = document.getElementById('yearSelect');
    var selectedYear = yearSelect.value;
    var url = 'reporte5.php?year=' + selectedYear; // Agrega el año seleccionado como parámetro en la URL
    mostrarPDF(url);

    var yearPopup = document.getElementById('yearPopup');
    yearPopup.style.display = 'none';
  }
</script>

<div class="popup2" id="datePopup">
  <h2 class="titulo-recuadro">GENERACIÓN DE REPORTE</h2>
  <h3>Selecciona el rango de las fechas:</h3>
  <div class="custom-select2">
    <h4 class ="h4" for="startDate">Fecha de inicio:</h4>
    <input type="date" id="startDate" name="startDate" class="date-input first">
    <br>
    <h5 class ="h5" for="endDate">Fecha de fin:</h5>
    <input type="date" id="endDate" name="endDate" class="date-input second">
  </div>
  <button class="edit-button33" onclick="generateDateReport()">Generar Reporte</button>
</div>

  <script>
    function showDatePrompt() {
      var datePopup = document.getElementById('datePopup');
      datePopup.style.display = 'block';
    }

    function generateDateReport() {
      var startDateInput = document.getElementById('startDate');
      var endDateInput = document.getElementById('endDate');

      var startDate = startDateInput.value;
      var endDate = endDateInput.value;

      if (startDate && endDate) {
        var url = 'reporte6.php?startDate=' + encodeURIComponent(startDate) + '&endDate=' + encodeURIComponent(endDate);
        mostrarPDF(url);
      }

      var datePopup = document.getElementById('datePopup');
      datePopup.style.display = 'none';
    }
  </script>


  <script>
    function mostrarPDF(pdf) {
      var container = document.getElementById('pdfContainer');
      container.innerHTML = '<iframe src="' + pdf + '" width="100%" height="100%" style="border: none;"></iframe>';
    }
  </script>
  <a class="edit-button2" href="paginaAdmin.php">Regresar</a>
  </body>
</html>
