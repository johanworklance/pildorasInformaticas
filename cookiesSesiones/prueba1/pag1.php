<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table,td{
        text-align:center;
    }
    table{
        width:25%;
        border:0;
        margin:auto;
    }
    img{
        width:100%;
        cursor:pointer;
    }
</style>
<body>
    <?php
        if(isset($_COOKIE['idiomaSeleccionado'])){
            if($_COOKIE['idiomaSeleccionado']=='es'){
                header("Location:spanish.php");
            }elseif($_COOKIE['idiomaSeleccionado']=='en'){
                header("Location:english.php");
            }
        }
    ?>
    <table>
        <tr>
            <td colspan="2" align="center"><h1>Elige idioma: </h1></td>
        </tr>
        <tr>
            <td><a href="crearCookie.php?idioma=es"><img src="españa.png" alt="" width="90" height="60"></a></td>
            <td><a href="crearCookie.php?idioma=en"><img src="eeuu.svg" alt="" width="90" height="60"></a></td>
        </tr>
    </table>
   <a href='eliminarCookie.php'>eliminar</a>
</body>
</html>