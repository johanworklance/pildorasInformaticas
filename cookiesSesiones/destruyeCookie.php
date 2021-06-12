<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(setcookie("prueba","Esta es la info de nuestra primera cookie",time()-1,"/phpPildoras/cookiesSesiones/zonaContenidos/"))//-1 para que la cree un segundo menos al actual, destruyendo la cookie creada en cookie.php

        echo "Cookie destruida";

    ?>
</body>
</html>