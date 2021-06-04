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

    $seccionArt= $_GET['seccion'];
    $nombreArt= $_GET['n_art'];
    $fechaArt= $_GET['fecha'];
    $paisArt= $_GET['p_orig'];
    $precioArt= $_GET['precio'];


    try{
        $conexion= new PDO("mysql:host=localhost;dbname=prueba","root","");

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//veo que es opcional, aun si no la uso, se envian correctamentes los objetos exceptions para los errores
        
        $conexion->exec("SET CHARACTER SET utf8");

        $sql="INSERT INTO `artículos` VALUES(:seccion, :nombre, :fecha, :pais, :precio)";

        $resultado= $conexion->prepare($sql);

        $resultado->execute(array(':seccion'=>$seccionArt,':nombre'=>$nombreArt,':fecha'=>$fechaArt, ':precio'=>$precioArt,':pais'=>$paisArt));

        if($resultado->rowCount()){
            echo "Registro exitoso";
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