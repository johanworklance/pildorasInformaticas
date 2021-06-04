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

$sql= "SELECT `sección`,`nombre artículo`,'fecha' FROM `artículos` WHERE `NOMBRE ARTÍCULO` = ?";//el ? sera el comodin para enlazar/bind, todo esto es para Consultas preparadas Evitando inyección SQL

$result= mysqli_prepare($conexion,$sql);//objeto del tipo mysqli_stmt

$ok= mysqli_stmt_bind_param($result,"s",$buscar);//s de string y el parametro a enlazar

$ok= mysqli_stmt_execute($result);

if(!$ok){
    echo "Error al ejecutar la consulta";
}else{
    $ok= mysqli_stmt_bind_result($result,$seccion,$nombre,$fecha);//a excepcion del primero, los demas parametros corresponden a las variables que tomaran los valores de lo encontrado
    echo "Artículos encontrados: <br><br>";

    while(mysqli_stmt_fetch($result)){//cada tupla o registro, true mientras haya
        echo "Sección: $seccion<br>
              Nombre del producto: $nombre<br>
              Fecha: $fecha";
    }
    mysqli_stmt_close($result);
}


//$consulta= "SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` LIKE '%$buscar%'";

//$consulta= "SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` = '$buscar'";

//IMPORTANTE "cenicero' OR 1='1" SI COLOCO LO QUE ESTA ENTRE COMILLAS EN EL INPUT DEL ARCHIVO formularioBusquedad.php, REALIZARA UNA INYECCIÓN SQL, y buscara todos los registros con está técnica de hacking, por que la consulta quedaria como SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` = 'cenicero' OR 1='1'

//echo "$consulta <br><br>";

/* $resultado= mysqli_query($conexion,$consulta);

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
 */
?>