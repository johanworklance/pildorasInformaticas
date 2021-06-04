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

        $seccion= $_GET['seccion'];
        $nombre= $_GET['nombre'];
        $precio= $_GET['precio'];
        $fecha= $_GET['fecha'];
        $pais= $_GET['pais'];
        

        $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

        if(!$conexion){
            echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
            exit(); 
        }

        mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

        mysqli_set_charset($conexion,"utf8");

        $consulta= "UPDATE `artículos` SET `sección`= '$seccion', fecha = '$fecha', `país de origen`= '$pais', precio = '$precio' WHERE `nombre artículo`= '$nombre'" ;

        $resultado= mysqli_query($conexion,$consulta);
        
        if(!$resultado){
            echo "Error en la consulta";
        }else{
            echo "Registro exitoso<br><br>";

            echo "<table>";
            echo "<tr>";
            echo "<td>$seccion</td>";
            echo "<td>$nombre</td>";
            echo "<td>$precio</td>";
            echo "<td>$fecha</td>";
            echo "<td>$pais</td>";
            echo "</tr>";
            echo "</table>";
        }
        mysqli_close($conexion);

    ?>
</body>
</html>