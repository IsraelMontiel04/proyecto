<?php
include('conexion.php');

session_start();

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit;
}

if(isset($_POST["nuevaInformacion"])){
    $nuevaInformacion = $_POST['nuevaInformacion'];
    $usuarios = $_POST['usuarios'];

    if (empty($nuevaInformacion) || empty($usuarios)) {
        echo '<script>
        alert("Por favor, ingrese información válida antes de guardar.");
        window.location= "/altaCalif.php";
        </script>';
    } else {
        $queryInsert = "INSERT INTO listas (numControl, clave, grupo, calif) VALUES (?, ?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $queryInsert);

        if ($stmtInsert) {
            foreach ($nuevaInformacion as $index => $info) {
                
                list($idUsuario, $claveUsuario, $grupoUsuario) = explode('|', $usuarios[$index]);
    
                mysqli_stmt_bind_param($stmtInsert, "sssi", $idUsuario, $claveUsuario, $grupoUsuario, $info);
                mysqli_stmt_execute($stmtInsert);
            }
            mysqli_stmt_close($stmtInsert);
            echo '<script>
            alert("Usuarios calificados");
            window.location= "/califAlumno.php";
            </script>';
        } else {
            echo '<script>
            alert("Error al insertar nueva información: ' . mysqli_error($conn) . '");
            window.location= "/califAlumno.php";
            </script>';
        }
    }
    mysqli_close($conn);
}
?>
