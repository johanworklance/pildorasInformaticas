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
        width: 300px;
        margin: auto;
        background-color: #ffc;
        border: 2px solid #f00;
        padding: 5px;
    }
    td{
        text-align:center;
    }
</style>
<body>
   
    <form action="conexionPDO.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="">Sección: </label>
                </td>
                <td>
                    <input type="text" name="seccion">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">País de origen: </label>
                </td>
                <td>
                    <input type="text" name="pais">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="enviar">
                </td>
            </tr> 
        </table>
    </form>
    
    
</body>
</html>