<?php
require('fpdf.php');

// Realizar la conexión a la base de datos (asegúrate de proporcionar los valores correctos)
$conexion = mysqli_connect('localhost', 'admin', 'estacionamientoc', 'estacionamiento');

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Realizar la consulta SQL
$query = "SELECT * FROM carro";
$resultado = mysqli_query($conexion, $query);
//Obteniendo la fecha actual
date_default_timezone_set("America/Mexico_City");
$fecha_actual = date('Y-m-d');
$fecha_actual2 = date('d-m-Y');
// Crear una nueva clase que extienda FPDF
class PDF extends FPDF
{
    var $isFirstPage = true;
    function Header()
    {
        if ($this->isFirstPage) { // Mostrar el título solo en la primera página
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, 'REPORTE DE TODOS LOS COCHES REGISTRADOS', 0, 1, 'C');
            $this->Ln(10);
            $this->isFirstPage = false;
        }
    }

    function Footer()
    {
        // Pie de página personalizado (opcional)
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }

    function TablaDatos($header, $data)
{
    // Fuente y tamaño para el contenido de la tabla
    $this->SetFont('Arial', '', 6);

    // Obtener el ancho máximo de cada columna
    $columnWidths = [];
    foreach ($header as $col) {
        $columnWidths[] = $this->GetStringWidth($col) + 6;
    }

    // Establecer el color de fondo gris para el encabezado de la tabla
    $this->SetFillColor(192, 192, 192);

    // Imprimir el encabezado de la tabla con el color de fondo gris
    foreach ($header as $key => $col) {
        $this->Cell($columnWidths[$key], 10, $col, 1, 0, 'C', true); 
    }
    $this->Ln();

    // Establecer el color de fondo blanco para los datos de la tabla
    $this->SetFillColor(255, 255, 255);

    foreach ($data as $row) {
        foreach ($row as $key => $col) {
            $this->Cell($columnWidths[$key], 10, $col, 1, 0, 'C', true); 
        }
        $this->Ln();
    }
}

}

// Crear un nuevo objeto PDF
$pdf = new PDF();

// Agregar una página
$pdf->AddPage();

// Agregar texto antes de la tabla
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Fecha de generacion del reporte: ' . $fecha_actual2, 0, 1); 
$pdf->Cell(0, 10, 'La siguiente tabla muestra todos los coches registrados: ', 0, 1); 
// Establecer los encabezados de la tabla
$header = array('ID COCHE', 'ID TARJETA','FECHA DE ENTRADA','HORA DE ENTRADA', 'FECHA DE SALIDA', 'HORA DE SALIDA', 'TARIFA', 'HORAS DE ESTANCIA', 'TOTAL');

// Obtener los datos de la consulta
$data = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $data[] = array(
        $fila['id_carro'],
        $fila['id_tarjeta'],
        $fila['fecha'],
        $fila['hora_entrada'],
        $fila['fecha_salida'],
        $fila['hora_salida'],
        $fila['tarifa'],
        $fila['horas_estancia'],
        $fila['total']
    );
}

// Generar la tabla de datos
$pdf->TablaDatos($header, $data);

// Establecer el número total de páginas en el pie de página
$pdf->AliasNbPages();

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Generar el PDF
$pdf->Output();
?>
