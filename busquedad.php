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

?>