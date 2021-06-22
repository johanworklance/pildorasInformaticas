<?php
    $dbHost= "localhost";
    $dbName= "prueba";
    $dbUsuario= "root";
    $dbPass= "";


    $id='';
    $tipo='';
    $contenido='';

    $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);

        if(!$conexion){
            echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
            exit(); //Sale y cancela la conexión
        }

        mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");

        mysqli_set_charset($conexion,"utf8");


        $consulta="SELECT * FROM archivos WHERE id = '1'";

        $resultado= mysqli_query($conexion,$consulta);

        

        while($fila=mysqli_fetch_array($resultado)){
            $id= $fila['id'];
            $tipo=$fila['tipo'];
            $contenido=$fila['contenido'];
        }

        echo "id: $id, tipo: $tipo <br>";

        echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'>";//decodificamos el valor blob de la BD y guala imagen aparece
        
        ?>


        