<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        margin:auto;
        width:400px;
        border:2px dashed red;
        height:300px;
    }
</style>
<body>
    <form action="datosArchivos.php" method="post" enctype="multipart/form-data">
        <table> 
            <tr>
                <td><label for="imagen">Imagen: </label>
                </td>
                <td><input type="file" name="archivo" size="20">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center"><input type="submit" value="Enviar archivo"></td>
            </tr>
        
        </table>
    
    
    </form>
</body>
</html>