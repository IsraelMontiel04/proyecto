<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="php/login.php" method="post">
            <h2 class="titulo">Iniciar Sesión</h2>
            <input type="text" id="username" name="username" class="ingresar" placeholder="&#128273; Usuario:" required>
            <input type="password" id="password" name="password" class="ingresar" placeholder="&#128274; Contraseña" required>
            <button type="submit" class="boton" name="btningresar">Iniciar Sesión</button>
        </form>
    </div>

</body>
</html>