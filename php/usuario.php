<?php
include("conexion.php");

session_start();

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuenta = $_POST["cuenta"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $tipo_usuario = $_POST["tipo_usuario"];

    $sql = "INSERT INTO usuario (cuenta, password, nombre, apePaterno, apeMaterno, tipoUsuario)
            VALUES ('$cuenta', '$password', '$nombre', '$apellido_paterno', '$apellido_materno', '$tipo_usuario')";
    
    $sql2="INSERT INTO login (cuenta, password) VALUES ('$cuenta', '$password')";
    
    //Verificar que el usuario no se repita por medio del numero de control
    $verificar_usuario= mysqli_query($conn,"SELECT * FROM usuario WHERE cuenta = '$cuenta'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
        <script>
            alert("ERROR: Este usuario ya esta registrado, intenta con otro diferente");
            window.location = "../maestro.php";
        </script>
        ';
        exit();
    }

    //Registrar usuario
    if ($conn->query($sql) === TRUE) {
        if($conn->query($sql2) === TRUE){
            echo '<script>
            alert("Usuario registrado");
            window.location = "../maestro.php";
            </script>';
        }
    } else {
        echo '<script>
        alert("ERROR: Este usuario ya esta registrado, intenta con otro diferente");
        window.location = "../maestro.php";
    </script>';
    }
    $conn->close();
}
?>
