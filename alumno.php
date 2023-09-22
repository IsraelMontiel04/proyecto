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
    <title>Alta de Alumnos</title>
</head>
<body>

    <header>
        <h1>Control De Extraescolares</h1>
      </header>
      <nav>
        <a href="principal.php">Inicio</a>
        <a href="maestro.php">Alta de Usuario</a>
        <a href="materia.php">Alta de Materias</a>
        <a href="calificaciones.php">Capturar calificaciones</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>
      <div class="container">
        <h1>Registro De Alumno</h1>
        <form action="php/estudiante.php " method="post">

            <label for="numControl">Numero de control:</label>
            <input type="text" id="numControl" name="numControl" minlength="8" maxlength="10" required>
            
            <label for="clave">Clave:</label>
            <input type="text" name="clave" id="clave" minlength="5" maxlength="5">

            <label for="grupo">Grupo:</label>
            <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" minlength="5" maxlength="30">

            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo">
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>

            <label for="carrera">Carrera:</label>
            <select id="carrera" name="carrera">
                <option value="in">Ingeniería Industrial</option>
                <option value="me">Ingeniería Mecánica</option>
                <option value="qu">Ingeniería Química</option>
                <option value="el">Ingeniería Electrónica</option>
                <option value="ie">Ingeniería Eléctrica</option>
                <option value="sc">Ingeniería Sistemas Computacionales</option>
                <option value="ge">Ingeniería Gestión Empresarial</option>
                <option value="if">Ingeniería Informática</option>
            </select>

            <label for="semestre">Semestre:</label>
            <select id="semestre" name="semestre">
                <option value="1">1 semestre</option>
                <option value="2">2 semestre</option>
                <option value="3">3 semestre</option>
                <option value="4">4 semestre</option>
                <option value="5">5 semestre</option>
                <option value="6">6 semestre</option>
                <option value="7">7 semestre</option>
                <option value="8">8 semestre</option>
                <option value="9">9 semestre</option>
                <option value="10">10 semestre</option>
                <option value="11">11 semestre</option>
                <option value="12">12 semestre</option>
                <option value="13">13 semestre</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
      </div>    
</body>
</html>