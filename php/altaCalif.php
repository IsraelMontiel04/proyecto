<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Capturar Calificaciones</title>
</head>
<body>
    <header>
        <h1>Control De Extraescolares</h1>
      </header>
      <nav>
        <a href="../califAlumno.php">Regresar</a>
      </nav>
    
      <div class="container">
        <?php    
        
        include('conexion.php');
        session_start();

        // Verificar si el usuario ha iniciado sesión antes de permitir el acceso
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
            exit;
        }
        
        if(isset($_POST["btnBuscar"])){
            // Obtén los valores ingresados en el formulario
            $clave = isset($_POST['clave']) ? $_POST['clave'] : "";
            $grupo = isset($_POST['grupo']) ? $_POST['grupo'] : "";
            
            // Evitar posibles ataques de SQL injection usando consultas preparadas
            $query = "SELECT numControl, nombre, apePaterno, apeMaterno, clave, grupo FROM alumnos WHERE clave = ? AND grupo = ?";
            $stmt = mysqli_prepare($conn, $query);
    
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $clave, $grupo);
                mysqli_stmt_execute($stmt);      
                // Obtener resultados
                $result = mysqli_stmt_get_result($stmt);      
                if (mysqli_num_rows($result) > 0) {
                    echo "<form action='guardarNuevaInformacion.php' method='post'>";      
                    echo "<table>";
                    echo 
                    "<tr>
                        <th>Num Control</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Clave</th>
                        <th>Grupo</th>
                        <th>Calificación</th>
                    </tr>";
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                 echo "<td>" . $row['numControl'] . "</td>";
                 echo "<td>" . $row['nombre'] . "</td>";
                 echo "<td>" . $row['apePaterno'] . "</td>";
                 echo "<td>" . $row['apeMaterno'] . "</td>";
                 echo "<td>" . $row['clave'] . "</td>";
                 echo "<td>" . $row['grupo'] . "</td>";
                 echo "<td>";
                 
                 echo "<input type='hidden' name='usuarios[]' value='" . $row['numControl'] . "|" . $row['clave'] . "|" . $row['grupo'] . "'>";
                 echo "<input type='text' name='nuevaInformacion[]' placeholder='Calificación' required>";
                 echo "</td>";
                 echo "</tr>";
                
                }
                echo "</table>";
                
                echo '<div id="btnGuardarContainer">';
                echo "<button type='submit' id='btnGuardar'>Guardar</button>";
                echo '</div>';
                echo "</form>";
            } else {
                echo"<script>
                alert('No se encontraron usuarios con la clave y grupo proporcionados.');
                window.location= '/califAlumno.php';
                </script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la consulta: " . mysqli_error($conn);
        }  
        mysqli_close($conn);
    }
    ?>
</div>
</body>
</html>
