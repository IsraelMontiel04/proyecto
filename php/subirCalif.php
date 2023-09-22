<?php
include("conexion.php");

session_start();

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $numControl= $_POST['numControl'];
    $clave = $_POST["clave"];
    $grupo = $_POST["grupo"];
    $calif = $_POST['calif'];

    $sql = "INSERT INTO listas (numControl, clave, grupo, calif)
        VALUES ('$numControl', '$clave', '$grupo', '$calif')";
    
     //Verificar que el usuario no se repita por medio del numero de control
     $verificar_usuario= mysqli_query($conn,"SELECT * FROM listas WHERE numControl = '$numControl'");
     if(mysqli_num_rows($verificar_usuario) > 0){
         echo'
         <script>
             alert("ERROR: Este usuario ya esta registrado, intenta con otro diferente");
             window.location = "../calificaciones.php";
         </script>
         ';
         exit();
     }

     if($conn -> query($sql) === TRUE){
        echo '<script>
        alert("Calificación registrada");
        window.location = "../calificaciones.php";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } $conn->close();

}

?>