<?php

    require_once("../modelo/objBlog.php");
    require_once("../modelo/manejoObjetos.php");

    try{

        $miConexion= new PDO('mysql:host=localhost; dbname=bdblog','root','');

        $miConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

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

                $destinoRuta= "../imagenesSubidas/";

                move_uploaded_file($_FILES['imagen']['tmp_name'],$destinoRuta . $_FILES['imagen']['name']);

                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imágenes";//tmp_name,name,error, son campos que crea el $_FILES cuando mandamos algo desde el formulario

            }else{
                echo "El archivo no se ha podido copiar al directorio de imágenes";
            }
        }

        $manejoObjetos= new ManejoObjetos($miConexion);

        $blog= new ObjetoBlog();

        $blog->setTitulo(htmlentities(addslashes($_POST['campo_titulo']),ENT_QUOTES));
        date_default_timezone_set('America/Caracas');
        $blog->setFecha(date("Y-m-d H:i:s"));
        $blog->setComentarios(htmlentities(addslashes($_POST['area_comentarios']),ENT_QUOTES));
        $blog->setImagen($_FILES['imagen']['name']);

        $manejoObjetos->insertaContenido($blog);

        echo "<br>Entrada de blog agregada con éxito<br><a href='../vista/Formulario.php'>Añadir nueva entrada</a>";
        
    

    }catch(Exception $e){
        die("ERROR: " . $e->getLine() . " " . $e->getMessage());
    }




