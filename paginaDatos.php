<link rel="stylesheet" href="styles.css">
<?php

require_once("datosConexion.php");



$conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

$usuario= mysqli_real_escape_string($conexion, $_GET['usuario']);
$contra= mysqli_real_escape_string($conexion, $_GET['contra']);
//$contra= $_GET['contra'];

if(!$conexion){
    echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
    exit(); 
}

mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

mysqli_set_charset($conexion,"utf8");

//$consulta= "SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` LIKE '%$buscar%'";

$consulta= "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contra = '$contra'";

//IMPORTANTE "cenicero' OR 1='1" SI COLOCO LO QUE ESTA ENTRE COMILLAS EN EL INPUT DEL ARCHIVO formularioBusquedad.php, REALIZARA UNA INYECCIÓN SQL, y buscara todos los registros con está técnica de hacking, por que la consulta quedaria como SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` = 'cenicero' OR 1='1'

echo "$consulta <br><br>";

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
    echo $fila['nombre'] . "</td><td>";
    echo $fila['contra'] . "</td><td>";
    echo $fila['telefono'] . "</td><td>";
    echo $fila['direccion'] . "</td>";

    echo "</tr>";

}
echo "</table>";

mysqli_close($conexion);

?>