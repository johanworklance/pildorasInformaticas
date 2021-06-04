<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php

    $seccion= $_POST['seccion'];
    $pais= $_POST['pais'];


    try{
        $conexion= new PDO("mysql:host=localhost;dbname=prueba","root","");

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//veo que es opcional, aun si no la uso, se envian correctamentes los objetos exceptions para los errores
        
        $conexion->exec("SET CHARACTER SET utf8");

        $sql="SELECT `NOMBRE ARTÍCULO`,`SECCIÓN`, PRECIO, `país de origen` FROM `ARTÍCULOSs` WHERE `SECCIÓN`= :seccion AND `país de origen`= :pais";

        $resultado= $conexion->prepare($sql);

        $resultado->execute(array(':seccion'=>$seccion,':pais'=>$pais));

        while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "Nombre artículo: " . $registro['NOMBRE ARTÍCULO'] . "
            <br> Sección: " . $registro['SECCIÓN'] . "<br> Precio: " . $registro['PRECIO'] . "<br>";

        }

        $resultado->closeCursor();

    }catch(Exception $e){
        die('Error:' . $e->GetMessage());
    }finally{//se ejecuta despues del try o del catch, el que surja
        $conexion= null;//con esto vaciamos la memoria
    }
        

    ?>
</body>
</html>