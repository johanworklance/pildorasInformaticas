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
    <h1>Bienvenidos Usuarios</h1>
<?php
    echo "Hola: " . $_SESSION['login'];
?>
    <p>Esta página es exclusiva para usuarios</p>

    <ul>
        <li><a href="usuariosRegistrados2.php">Página 2</a></li>
        <li><a href="usuariosRegistrados3.php">Página 3</a></li>
        <li><a href="cierre.php">Cerrar Sesión</a></li>
    </ul>
</body>
</html>