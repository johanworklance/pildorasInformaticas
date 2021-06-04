<?php

    require_once("devuelveProductos.php");

    $productos= new DevuelveProductos();

    $arrayProductos= $productos->getProductos();
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <table>
        
    <?php
        $contador=0;
        foreach($arrayProductos as $elemento){
            echo "<tr>";
            if(!$contador){
                foreach($elemento as $key=>$elementos){
                        echo "<th>" . $key . "</th>";  
                    }
                }
            $contador++;
            "</tr>"; 
                echo "<tr>" .
                       "<td>" . $elemento['SECCIÓN'] . "</td>" . 
                       "<td>" . $elemento['NOMBRE ARTÍCULO'] . "</td>" .
                       "<td>" . $elemento['FECHA'] . "</td>" .
                       "<td>" . $elemento['PAÍS DE ORIGEN'] . "</td>" .
                       "<td>" . $elemento['PRECIO'] . "</td>" .
                 "</tr>";
            
            
        }
    

    ?>

    
    </table>
</body>
</html>