<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <?php
        function ejecutar($buscar){
            require_once("datosConexion.php");

            //$buscar=$_GET['buscar'];

            $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

            if(!$conexion){
                echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
                exit(); 
            }

            mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

            mysqli_set_charset($conexion,"utf8");

            $consulta= "SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` LIKE '%$buscar%'";

            $resultado= mysqli_query($conexion,$consulta);

            $avanzar=0;
            echo "<table>";

            while($fila= mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                if($avanzar==0){
                    echo "<tr>";
                    foreach($fila as $key=>$valor){
                        echo "<th>$key</th>";
                    }
                    echo "</tr><tr>";
                    $avanzar++;
                }else{
                    echo "<table><tr>";
                }
                
                echo "<td>";
                echo $fila['SECCIÓN'] . "</td><td>";
                echo $fila['NOMBRE ARTÍCULO'] . "</td><td>";
                echo $fila['FECHA'] . "</td><td>";
                echo $fila['PAÍS DE ORIGEN'] . "</td><td>";
                echo $fila['PRECIO'] . "</td>";
                
                echo "</tr>";
            }
            echo "</table>";

            mysqli_close($conexion);
        }

        

    ?>
</head>
<body>
<?php
    $miBusquedad=$_GET['buscar'];
    $miPagina=$_SERVER['PHP_SELF'];//PHP_SELF tiene el nombre del archivo donde se está ejecutando el script
    

    if($miBusquedad != NULL){
        ejecutar($miBusquedad);
    }
    else{
        echo "<form action='" . $miPagina . "' method='get'>
                <label for='buscar'>Buscar <input type='text' name='buscar' id='buscar'></label>
                <input type='submit' value='dale'>
             </form>";
    }
?>
    
</body>
</html>