<link rel="stylesheet" href="styles.css">
<?php

require_once("../datosConexion.php");


$seccionArt= $_GET['seccion'];
$nombreArt= $_GET['n_art'];
$fechaArt= $_GET['fecha'];
$paisArt= $_GET['p_orig'];
$precioArt= $_GET['precio'];


$conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

if(!$conexion){
    echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
    exit(); 
}

mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

mysqli_set_charset($conexion,"utf8");

$sql= "INSERT INTO `artículos` VALUES(?,?,?,?,?)";//el ? sera el comodin para enlazar/bind, todo esto es para Consultas preparadas Evitando inyección SQL

$result= mysqli_prepare($conexion,$sql);//objeto del tipo mysqli_stmt

$ok= mysqli_stmt_bind_param($result,"sssss",$seccionArt,$nombreArt,$fechaArt,$paisArt,$precioArt);//s de string y el o los parametros a enlazar

$ok= mysqli_stmt_execute($result);

if(!$ok){
    echo "Error al ejecutar la consulta";
}else{
    echo "Agregado nuevo registro";
    mysqli_stmt_close($result);
}


?>