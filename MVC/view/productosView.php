<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    td{
        border:1px solid black;
    }
    th{
        border:3px solid black;
    }
</style>
<body>
    <table>
        <tr>
            <th>Nombre del artículo: </td>
        </tr>
    
    <?php
        foreach($matrizProductos as $registros){
            
            
                echo "<tr><td>" . $registros['NOMBRE ARTÍCULO'] . "</td></tr>";
            
            
        }
    ?>

    </table>
</body>
</html>