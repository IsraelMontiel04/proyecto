<?php
session_start();
include("conexion.php");

if(isset($_POST["btningresar"])){
    $cuenta = isset($_POST["username"]) ? $_POST["username"] : "";
    $pass = isset($_POST["password"]) ? $_POST["password"] : "";

    $query = mysqli_query($conn, "SELECT l.*, u.tipoUsuario FROM login l 
                           INNER JOIN usuario u ON l.cuenta = u.cuenta 
                           WHERE l.cuenta = '$cuenta' AND l.password='$pass'");
    
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $tipoUsuario = $row['tipoUsuario'];
        $_SESSION['usuario'] = $cuenta; // Establecer la variable de sesión

        if ($tipoUsuario === 'a') {
            header("location: ../principal.php");
        } elseif ($tipoUsuario === 'p') {
            header("location: ../principalProfesor.php");
        } else {
            echo'<script>
                alert("El usuario no tiene un tipo de usuario válido");
                window.location = "../index.php";
            </script>';
        }
        exit;
    } else {
        echo'<script>
            alert("El usuario no existe, por favor verifique los datos introducidos");
            window.location = "../index.php";
        </script>';
    }
    exit;
}

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso a otras páginas
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit;
}  
?>