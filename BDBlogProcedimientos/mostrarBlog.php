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
        $conexion= mysqli_connect("localhost","root","","bdblog");

        if(!$conexion){
            echo "La conexión ha fallado" . mysqli_error();
            exit();//o die() es lo mismo
        }

        $sql="SELECT * FROM contenido ORDER BY fecha DESC";

        if($resultado=mysqli_query($conexion,$sql)){
            while($registro=mysqli_fetch_assoc($resultado)){
                echo "<h3>" .  $registro['titulo'] . "</h3>";
                echo "<h4>" .  $registro['fecha'] . "</h4>";
                echo "<div style='width:400px'>" .  $registro['comentarios'] . "</div><br><br>";
                if($registro['imagen'] != ''){//si la imagen no esta vacia por si no quisieron enviar en el formulario
                    echo "<img src='imagenesSubidas/" . $registro['imagen'] . "' style='width:300px'>";
                }
                echo "<hr>";
            }
        }

    ?>

    
</body>
</html>