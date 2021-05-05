<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
            require_once("datosConexion.php");

            $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

            if(!$conexion){
                echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
                exit(); 
            }

            mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

            mysqli_set_charset($conexion,"utf8");

            $consulta= "INSERT INTO `artículos`(`SECCIÓN`, `NOMBRE ARTÍCULO`, `FECHA`, `PAÍS DE ORIGEN`, `PRECIO`) VALUES ('pokemones', 'pikacha','21/02/2012','japon','corazon')";

            $resultado= mysqli_query($conexion,$consulta);

            mysqli_close($conexion);

    ?>
</body>
</html>