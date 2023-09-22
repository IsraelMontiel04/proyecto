<?php
require('fpdf186/fpdf.php'); // Incluye la clase FPDF

// Conecta a tu base de datos (reemplaza con tus propios detalles)
$conexion = new mysqli("localhost", "root", "", "extraescolares");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtén la clave y el grupo del formulario
$clave = $_POST['clave'];
$grupo = $_POST['grupo'];

// Consulta SQL para obtener las calificaciones según la clave y el grupo
$query = "SELECT numControl, clave, grupo, calif FROM listas WHERE clave = '$clave' AND grupo = '$grupo'";
$resultado = $conexion->query($query);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

// Inicializa el PDF
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Calificaciones', 0, 1,'C');

// Genera la tabla de calificaciones
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(35, 10, 'Numero Control', 1, 0, 'C');
$pdf->Cell(37, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(37, 10, 'Apellido Paterno', 1, 0, 'C');
$pdf->Cell(37, 10, 'Apellido Materno', 1, 0, 'C');
$pdf->Cell(30, 10, 'Clave', 1, 0, 'C');
$pdf->Cell(30, 10, 'Grupo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Calificacion', 1, 0, 'C');
$pdf->Ln();

while ($fila = $resultado->fetch_assoc()) {

    $query = "SELECT nombre, apePaterno, apeMaterno FROM alumnos WHERE numControl = '".$fila['numControl']."'";
    $datos = $conexion->query($query);
    $fila2 = $datos->fetch_assoc();
    
    $pdf->Cell(35, 10, $fila['numControl'], 1, 0, 'C');
    $pdf->Cell(37, 10, $fila2['nombre'], 1, 0, 'C');
    $pdf->Cell(37, 10, $fila2['apePaterno'], 1, 0, 'C');
    $pdf->Cell(37, 10, $fila2['apeMaterno'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['clave'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['grupo'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['calif'], 1, 0, 'C');
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output('reporte_calificaciones.pdf', 'D');

// Cierra la conexión a la base de datos
$conexion->close();
?>
