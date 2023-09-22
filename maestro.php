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
    <title>Alta De Usuario</title>
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
      </header>
      <nav>
        <a href="principal.php">Inicio</a>
        <a href="alumno.php">Alta de Alumnos</a>
        <a href="materia.php">Alta de Materias</a>
        <a href="calificaciones.php">Capturar calificaciones</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>
      <div class="container">
        <h1>Registro De Usuario</h1>
        <form action="php/usuario.php" method="post">

            <label for="cuenta">Cuenta:</label>
            <input type="text" id="cuenta" name="cuenta" maxlength="10" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Maximo de 10 caracteres" minlength="10" maxlength="10" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>

            <label for="tipo_usuario">Tipo de Usuario:</label>
            <select id="tipo_usuario" name="tipo_usuario">
                <option value="admin">Administrador</option>
                <option value="profe">Profesor</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
      </div>
</body>
</html>