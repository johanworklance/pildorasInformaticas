<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="view/hoja.css">
</head>
<style>
    h1{
        text-align:center;
        margin:auto;
    }
    td{
        border:1px solid black;
    }
    th{
        border:3px solid black;
    }
    a{
        padding:5px;
        margin:0 5px;
        text-decoration:none;
        color:black;
    }
    a:hover{
        background-color:#9ea0a3;
    }

</style>
<body>
    <h1>Modelo Vista Controlador</h1>
    <?php
        require_once("controller/personsController.php");

    ?>
</body>
</html>