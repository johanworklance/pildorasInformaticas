<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <?php
        require_once("datosConexion.php");

        $conexion= mysqli_connect($dbHost,$dbUsuario,$dbPass);//cuarto parametro opcional, podemos establecer su BD con el comando mysql_select_db

        /* if(mysqli_connect_errno()){
            echo "Fallo en la conexión";
            exit();
        } */

        if(!$conexion){
            echo "Hay un problema con la conexión al servidor :c" . ", el error es " . mysqli_connect_errno();
            exit(); //Sale y cancela la conexión
        }

        mysqli_select_db($conexion,$dbName) or die("No se encuentra la base de datos");//die es como un exit, detiene la ejecucion

        mysqli_set_charset($conexion,"utf8");//a veces php ya tiene esta config

        //$consulta= "SELECT * FROM datos_personales";

        $consulta= "SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` = 'Tubos'";

        //$consulta= "SELECT * FROM `artículos` WHERE `PAÍS DE ORIGEN` = 'ESPAÑA'";

        $resultado= mysqli_query($conexion,$consulta);//resultSet o recordSet
        /* 
        //primer registro
        $fila= mysqli_fetch_row($resultado);//array del primer registro del resulSet o tabla, si le llamas una segunda vez, accede al segundo registro y así sucesivamente

        var_dump($fila);

        echo $fila[0] . "<br>";
        echo $fila[1] . "<br>";
        echo $fila[2] . "<br>";
        echo $fila[3] . "<br>";

        //segundo registro
        $fila= mysqli_fetch_row($resultado);//segundo llamado del fetch al mismo resulSet que es $resultado

        var_dump($fila);

        echo $fila[0] . "<br>";
        echo $fila[1] . "<br>";
        echo $fila[2] . "<br>";
        echo $fila[3] . "<br>"; */

        $registro=1;

        //while($registro<=2){//sabiendo que solo hay 2 registros en la tabla/resulSet
        //while($fila= mysqli_fetch_row($resultado)){//si en el resulSet aun hay datos, entonces es posible esta asignacion y devolvera true, cuando no hayan datos mandara false
            //$fila= mysqli_fetch_row($resultado);
        $avanzar=0;
        echo "<table>";
        while($fila= mysqli_fetch_array($resultado,MYSQLI_ASSOC)){//a diferencia del anterior, este trae un array asociativo
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

        mysqli_close($conexion);//cerramos conexion, es regla por que se pueden abrir otras conexiones, asi especificamos cual cerrar y ahorrar recursos


    ?>
</body>
</html>