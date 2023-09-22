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
    <title>Capturar Calificaciones</title>
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
      </header>
      <nav>
        <a href="principalProfesor.php">Inicio</a>
        <a href="listaAlumnos.php">Listas de Alumnos</a>
        <a href="califProfe.php">Dar Alta Calificación</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>
    
      <div class="container">
        <form action="php/altaCalif.php" method="post">
          <h1>Capturar Calificaciones</h1>

          <label for="clave">Clave:</label>
          <input type="text" name="clave" id="clave" minlength="5" maxlength="5" required>

          <label for="grupo">Grupo:</label>
          <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1" required>

          <button type="submit" name="btnBuscar">Buscar</button>
        </form>
      </div>

</body>
</html>