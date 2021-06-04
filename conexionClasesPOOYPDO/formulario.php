<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        width:300px;
        margin:auto;
        border:2px solid black;
        padding:5px;
        text-align:center;
    }
    input[type="submit"]{
        padding:5px;
        margin:5px;
        background-color:green;
    }
</style>
<body>
    <form action="index.php" method="get">
        <label for="">Introducir País: <input type="text" name="pais"></label>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>