<?php
    include('conexion.php');

    session_start();

// Verificar si el usuario ha iniciado sesión antes de permitir el acceso
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura los valores del formulario
        $tipo = $_POST["tipo"];
        $clave = $_POST["clave"];
        $grupo = $_POST["grupo"];
        $maestro = $_POST["maestro"];
        $descripcion = $_POST["descripcion"];

        $sql = "INSERT INTO extraescolares (clave, descripcion, tipo) VALUES ('$clave', '$descripcion', '$tipo')";
        $sql2= "INSERT INTO grupos(clave, grupo, maestro) VALUES ('$clave','$grupo','$maestro')";

        //Verificar que el usuario no se repita por medio del numero de control
        $verificar_usuario= mysqli_query($conn,"SELECT * FROM extraescolares WHERE clave = '$clave'");
        $verificar_usuario2= mysqli_query($conn,"SELECT * FROM grupos WHERE clave = '$clave'");
        
        if(mysqli_num_rows($verificar_usuario) > 0){
            if(mysqli_num_rows($verificar_usuario2) > 0){
                echo'
            <script>
                alert("ERROR: Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../materia.php";
            </script>
            ';
            exit();
            }
        }

        if ($conn->query($sql) === TRUE) {
            // Insertar en la tabla 'grupos'
            if ($conn->query($sql2) === TRUE) {
                // Obtener los días seleccionados y sus horas correspondientes
                $diasSeleccionados = $_POST["dias"];
                foreach ($diasSeleccionados as $dia) {
                    $hora = $_POST["horas_" . $dia];
                    // Insertar la hora en la columna correspondiente del día en la tabla 'grupos'
                    $columnaDia = "h" . ucfirst($dia); // Convertir el día en formato hXxxx (ej. hLun)
                    $sqlDia = "UPDATE grupos SET $columnaDia = '$hora' WHERE grupo = '$grupo'";
                    $conn->query($sqlDia);
                }
                echo '<script>
                    alert("Materia Registrada");
                    window.location = "../materia.php";
                    </script>';
            }
        }
         else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();


    }
?>
