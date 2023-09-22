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
    <title>Generar Lista de Alumnos</title>
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
    </header>
      <nav>
        <a href="principalProfesor.php">Inicio</a>
        <a href="#">Capturar Calificaciones</a>
        <a href="califProfe.php">Dar Alta Calificación</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>

      <div class="container">
        <form action="generar_lista.php" method="post">
        <h1>Generar Lista de Alumnos</h1>
        <label for="">Escriba la clave y grupo para generar la lista de los alumnos.</label>
          <label for="clave">Clave:</label>
          <input type="text" name="clave" id="clave" minlength="5" maxlength="5" required>
          
          <label for="grupo">Grupo:</label>
          <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1" required>
          <button type="submit">Generar Lista</button>
        </form>
      </div>
</body>
</html>