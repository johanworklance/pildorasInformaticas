<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $conexion= mysqli_connect("localhost","root","","bdblog");

        if(!$conexion){
            echo "La conexión ha fallado" . mysqli_error();
            exit();//o die() es lo mismo
        }

        if($_FILES['imagen']['error']){//cuando vale 0, es que no hubo ningun problema, es una propiedad que php crea en el array
            switch($_FILES['imagen']['error']){
                case 1: //ERROR EXCESO DE TAMAÑO EN php.ini
                    echo "EL tamaño del archivo excede lo permitido en el servidor";
                    break;
                case 2: //ERROR EXCESO DE TAMAÑO establecido en el formulario
                    echo "EL tamaño del archivo pesa mas de 2mbs";
                    break;
                case 3: //Error al subirse, corrupcion de archivo
                    echo "El envio de archivo se interrumpio";
                    break;
                case 4: //No se escogio ningun archivo
                    echo "No se ha enviado archivo alguno";
                    break;
            }
        }else{
            echo "No hay error, subida correctamente<br>";
            
            if(isset($_FILES['imagen']['name']) && $_FILES['imagen']['error']==UPLOAD_ERR_OK){//Si se ha subido una imagen y no ha habido error al subir, entra

                $destinoRuta= "imagenesSubidas/";

                move_uploaded_file($_FILES['imagen']['tmp_name'],$destinoRuta . $_FILES['imagen']['name']);

                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imágenes";//tmp_name,name,error, son campos que crea el $_FILES cuando mandamos algo desde el formulario

            }else{
                echo "El archivo no se ha podido copiar al directorio de imágenes";
            }
        }


        date_default_timezone_set('America/Caracas');//para que registre con hora de venezuela, de otra manera asigna otra hora, no se de que pais, aunque lo pone con media hora de mas, debe ser el viejo horario

        $titulo= $_POST['campo_titulo'];
        $fecha= date('Y-m-d H:i:s');
        $comentarios= $_POST['area_comentarios'];
        $imagen= $_FILES['imagen']['name'];
        echo " <br>$titulo  $fecha  $comentarios  $imagen";

        $miConsulta= "INSERT INTO contenido (titulo, fecha, comentarios, imagen) VALUES('$titulo','$fecha','$comentarios','$imagen')";

        $resultado= mysqli_query($conexion,$miConsulta);

        mysqli_close($conexion);

        echo "<br>Se ha registrado la entrada con éxito<br><br>";
    ?>
    <a href="Formulario.php">Añadir nueva entrada</a>
    <a href="mostrarBlog.php">Mostrar Blog</a>
</body>
</html>