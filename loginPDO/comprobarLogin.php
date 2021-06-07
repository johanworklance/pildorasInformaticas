<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        try{
            $base= new PDO("mysql:host=localhost; dbname=prueba","root","");

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql="SELECT * FROM userspass WHERE user= :login AND password= :pass";

            $resultado= $base->prepare($sql);

            $login=htmlentities(addslashes($_POST['login']));
            $pass=htmlentities(addslashes($_POST['pass']));

            $resultado->bindValue(":login",$login);
            $resultado->bindValue(":pass",$pass);

            $resultado->execute();

            $numeroRegistro= $resultado->rowCount();

            if($numeroRegistro){
                
                session_start();
                $_SESSION['login']= $login;
                
                header("location:usuariosRegistrados.php");
            }else{
                header("location:login.php");
            }


        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    ?>
</body>
</html>