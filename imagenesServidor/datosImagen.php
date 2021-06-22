<?php
    //recibimos los datos de la imagen
    $nombreImagen= $_FILES['imagen']['name'];
    $tipoImagen= $_FILES['imagen']['type'];
    $tamañoImagen= $_FILES['imagen']['size'];

    
   
    if($tamañoImagen<=1000000){//1 millon de bytes= 1mb o 1000 kilobytes

        if($tipoImagen=='image/jpeg' || $tipoImagen=='image/jpg' ||$tipoImagen=='image/png' || $tipoImagen=='image/gif'){
            $carpetaDestino= $_SERVER['DOCUMENT_ROOT'] . '/phpPildoras/uploadsImages/';//ruta de la carpeta destino

            //movemos la imagen del directorio temporal al directorio escogido
            move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetaDestino.$nombreImagen);
        }else{
            echo "El formato de imagen es invalido";
        }
            

    }else{
        echo "El tamaño de la imagen excede el permitido";
    }

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

        $sql= "UPDATE artículos SET FOTO= '$nombreImagen' WHERE `NOMBRE ARTÍCULO`= 'Tubos' LIMIT 1";

        

        $resultado= mysqli_query($conexion,$sql);