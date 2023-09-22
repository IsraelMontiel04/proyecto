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
    <title>Dar Alta Materia</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
    </header>
      <nav>
        <a href="principal.php">Inicio</a>
        <a href="maestro.php">Alta de Usuario</a>
        <a href="alumno.php">Alta de Alumnos</a>
        <a href="calificaciones.php">Capturar calificaciones</a>
        <a href="php/cerrarSesion.php">Salir</a>
      </nav>

      <div class="container">
        <h1>Registro De Extraescolar</h1>
        <form action="php/materiaAlta.php" method="post">

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="c">Cultural</option>
                <option value="d">Deportvo</option>
            </select>

            <label for="clave">Clave:</label>
            <input type="text" name="clave" id="clave" minlength="5" maxlength="5">

            <label for="grupo">Grupo:</label>
            <input type="text" name="grupo" id="grupo" minlength="1" maxlength="1">

            <label for="maestro">Maestro</label>
            <input type="text" name="maestro" id="maestro">

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion">

            <label for="dias">Seleccione los días e ingrese la hora:</label>
            <div id="dias" name="dias">
                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="lunes">Lunes</label>
                    <input type="text" name="horas_lunes" placeholder="Ej: 0809" minlength="4" maxlength="4">
                </div>

                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="martes">Martes</label>
                    <input type="text" name="horas_martes" placeholder="Ej: 0910" minlength="4" maxlength="4">
                </div>

                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="miercoles">Miercoles</label>
                    <input type="text" name="horas_miercoles" placeholder="Ej: 1011" minlength="4" maxlength="4">
                </div>

                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="jueves">Jueves</label>
                    <input type="text" name="horas_jueves" placeholder="Ej: 1112" minlength="4" maxlength="4">
                </div>

                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="viernes">Viernes</label>
                    <input type="text" name="horas_viernes"placeholder="Ej: 1213" minlength="4" maxlength="4">
                </div>

                <div class="dia">
                    <label><input type="checkbox" name="dias[]" value="sabado">Sábado</label>
                    <input type="text" name="horas_sabado"placeholder="Ej: 1314" minlength="4" maxlength="4">
                </div>
            </div>

            <button type="submit">Registrar</button>
        </form>
      </div>
    
</body>
</html>