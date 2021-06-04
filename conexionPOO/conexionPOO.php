<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php
        $conexion= new mysqli("localhost","root","","prueba");

        if($conexion->connect_errno){
            echo "Fallo la conexión ". $conexion->connect_errno;
        }

        $conexion->set_charset("utf8");

        $sql="SELECT * FROM `artículos`";

        $resultados= $conexion->query($sql);

        if($conexion->errno){
            die($conexion->error);
        }

        $avanzar= 0;
        echo "<table>";

        while($fila=$resultados->fetch_assoc()){
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

        $conexion->close();

    ?>
</body>
</html>