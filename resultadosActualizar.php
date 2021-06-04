<link rel="stylesheet" href="styles.css">
<?php

require_once("datosConexion.php");

$buscar=$_GET['buscar'];

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




while($fila= mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

    echo "<form action='actualizarPHP.php' method='GET'>";
    echo "<input type='text' name='seccion' value='" . $fila['SECCIÓN'] . "'> <br>";
    echo "<input type='text' name='nombre' value='" . $fila['NOMBRE ARTÍCULO'] . "' readonly> <br>";
    echo "<input type='text' name='fecha' value='" . $fila['FECHA'] . "'> <br>";
    echo "<input type='text' name='pais' value='" . $fila['PAÍS DE ORIGEN'] . "'> <br>";
    echo "<input type='text' name='precio' value='" . $fila['PRECIO'] . "'> <br>";
    
    echo "<input type='submit' name='enviar' value='actualizar'>";
    echo "</form>";
}


mysqli_close($conexion);

?>