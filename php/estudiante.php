<?php

    include('conexion.php');
    session_start();

        // Verificar si el usuario ha iniciado sesión antes de permitir el acceso
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
            exit;
        }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $numControl= $_POST['numControl'];
        $clave = $_POST['clave'];
        $grupo = $_POST['grupo'];
        $nombre = $_POST['nombre'];
        $aPaterno=$_POST['apellido_paterno'];
        $aMaterno = $_POST['apellido_materno'];
        $carrera = $_POST['carrera'];
        $sexo = $_POST['sexo'];
        $semestre = $_POST['semestre'];
        $descripcion = $_POST["descripcion"];
        
        $sql = "INSERT INTO alumnos (numControl, clave, grupo, nombre, apePaterno, apeMaterno, carrera, sexo, semestre)
        VALUES ('$numControl', '$clave', $grupo, '$nombre', '$aPaterno', '$aMaterno', '$carrera','$sexo','$semestre')";

        $sql2 ="INSERT INTO carrera(numControl, carrera, descripcion) VALUES ('$numControl','$carrera','$descripcion')";

        //Verificar que el usuario no se repita por medio del numero de control
        $verificar_usuario= mysqli_query($conn,"SELECT * FROM alumnos WHERE numControl = '$numControl'");
        if(mysqli_num_rows($verificar_usuario) > 0){
            echo'
            <script>
                alert("ERROR: Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../maestro.php";
            </script>
            ';
            exit();
        }

        if($conn -> query($sql) === TRUE){
            if($conn -> query($sql2) === TRUE){
                echo '<script>
                alert("Usuario registrado");
                window.location = "../alumno.php";
                </script>';
            }
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } $conn->close();
    }
?>