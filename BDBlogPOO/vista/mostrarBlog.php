<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Blog</h2>
    <hr>
    <?php
        require_once('../modelo/manejoObjetos.php');

        try{

            $miConexion= new PDO('mysql:host=localhost; dbname=bdblog','root','');
    
            $miConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $manejoObjetos= new ManejoObjetos($miConexion);

            $tablaBlog= $manejoObjetos->getContenidoPorFecha();

            if(empty($tablaBlog)){
                echo "No hay entradas de blog aún";
            }else{
                foreach ($tablaBlog as $cadaBlog) {
                    echo "<h3>" . $cadaBlog->getTitulo() . "</h3>";
                    echo "<h4>" . $cadaBlog->getFecha() . "</h4>";
                    echo "<div style='width:400px'>" . $cadaBlog->getComentarios() . "</div><br><br>";

                    if($cadaBlog->getImagen() != ''){//si la imagen no esta vacia por si no quisieron enviar en el formulario
                        echo "<img src='../imagenesSubidas/" . $cadaBlog->getImagen() . "' style='width:300px;height:200px' alt='" . $cadaBlog->getImagen()  . "'>";
                       
                    }
                    echo "<hr>";
                }
            }



        }catch(Exception $e){
            die("ERROR: " . $e->getLine() . " " . $e->getMessage());
        }

    ?>
<br>
<a href="Formulario.php">Añadir nueva entrada</a>

    
</body>
</html>