<?php
    //recibimos los datos de la imagen
    $nombreArchivo= $_FILES['archivo']['name'];
    $tipoArchivo= $_FILES['archivo']['type'];
    $tamañoArchivo= $_FILES['archivo']['size'];

    
   
    if($tamañoArchivo<=1000000){

        
            $carpetaDestino= $_SERVER['DOCUMENT_ROOT'] . '/phpPildoras/uploadsImages/';

            
            move_uploaded_file($_FILES['archivo']['tmp_name'],$carpetaDestino.$nombreArchivo);
        
            

    }else{
        echo "El tamaño del archivo excede el permitido";
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

        $archivoObjetivo= fopen($carpetaDestino . $nombreArchivo, "r");//abre un flujo de datos para apuntar a un archivo

        $contenido= fread($archivoObjetivo,$tamañoArchivo);//convierte el archivo a bytes, que es el tipo de dato BLOB

        $contenido= addslashes($contenido);//escapa los / de la ruta
        

        fclose($archivoObjetivo);//cerramos el flujo


        $sql= "INSERT INTO archivos(id,nombre,tipo,contenido) VALUES('','$nombreArchivo','$tipoArchivo','$contenido')"; //debe ir entrecomillado el archivo blob,  es decir $contenido

        $resultado= mysqli_query($conexion,$sql);

        if(mysqli_affected_rows($conexion)>0){//no vale no poner >0, no se por que si se supone que un valor positivo es true
            echo "Se ha insertado el registro con exito";
        }else{
            echo "No se ha podido insertar el registro";
        }