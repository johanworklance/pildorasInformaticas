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
        $nombre= $_GET['n_art'];
        $precio= $_GET['precio'];
        $fecha= $_GET['fecha'];
        $imp= $_GET['importado'];//no hice nada con este valor
        $pais= $_GET['p_orig'];

        $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

        if(!$conexion){
            echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
            exit(); 
        }

        mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

        mysqli_set_charset($conexion,"utf8");

        $consulta= "DELETE FROM `artículos` WHERE `nombre artículo` = '$nombre'";

        $resultado= mysqli_query($conexion,$consulta);
        
        if(!$resultado){
            echo "Error en la consulta";
        }else{
            if(mysqli_affected_rows($conexion)==0){
                echo "No hay registro que eliminar con ese criterio<br><br>";
            }else{
                echo "Eliminación exitosa<br>";
                echo "Registros eliminados: " . mysqli_affected_rows($conexion);
            }

        }
        mysqli_close($conexion);

    ?>
</body>
</html>