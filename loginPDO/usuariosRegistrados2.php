<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
    }
?>
    <h1>Bienvenidos Usuarios Página 2</h1>
<?php
    echo "Usuario: " . $_SESSION['login'];
?>
    <p>Esta página es exclusiva para usuarios</p>
    <a href="usuariosRegistrados.php">Volver</a>
    <li><a href="cierre.php">Cerrar Sesión</a></li>
</body>
</html>