<?php
    $dbHost= "localhost";
    $dbName= "prueba";
    $dbUsuario= "root";
    $dbPass= "";

    $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

        if(!$conexion){
            echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
            exit(); //Sale y cancela la conexión
        }

        mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

        mysqli_set_charset($conexion,"utf8");


        $consulta="SELECT FOTO FROM artículos WHERE `NOMBRE ARTÍCULO` = 'Tubos' LIMIT 1";

        $resultado= mysqli_query($conexion,$consulta);

        

        while($fila=mysqli_fetch_array($resultado)){
            $rutaImg=$fila['FOTO'];
        }

        ?>


        <div style="width:500px;margin:auto">
            <img src="/phpPildoras/uploadsImages/<?=$rutaImg?>" alt="Imagen" style="width:100%">
        
        </div>