<?php
session_start();

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Calificaciones</title>
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
      </header>
      <nav>
        <a href="principal.php">Inicio</a>
        <a href="maestro.php">Alta de Usuario</a>
        <a href="alumno.php">Alta de Alumnos</a>
        <a href="materia.php">Alta de Materias</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>
    
      <div class="container">
        <h1>Dar Alta Calificaciones</h1>
        <form action="php/subirCalif.php" method="post">

          <label for="numControl">Numero de control:</label>
          <input type="text" id="numControl" name="numControl" maxlength="10" required >

          <label for="clave">Clave:</label>
          <input type="text" name="clave" id="clave" minlength="5" maxlength="5" required>

          <label for="grupo">Grupo:</label>
          <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1" required>

          <label for="calif">Calificación:</label>
          <input type="text" id="calif" name="calif" required>

          <button type="submit">Registrar</button>
        </form>

        <form action="generar_reporte.php" method="post">
          <h1>Generar Reporte Calificaciones</h1>

          <label for="clave">Clave:</label>
          <input type="text" name="clave" id="clave" minlength="5" maxlength="5" required>

          <label for="grupo">Grupo:</label>
          <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1" required>

          <button type="submit">Generar Reporte PDF</button>
        </form>
      </div>

</body>
</html>