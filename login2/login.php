<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1,h2{
        text-align:center;
    }
    table{
        width:25%;
        background-color: #ffc;
        border:2px dotted #f00;
        margin:auto;
    }
        .izq{
            text-align:left;
        }
        .der{
            text-align:right;
        }
        td{
            text-align:center;
            padding:10px;
        }
    img{
        width:100%;
    }
    .imagenes{
        width:800px;
        border:0;
    }
</style>
<body>
    <?php
        if(isset($_POST['enviar'])){

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
                    
                    
                }else{
                    echo "Usuario o Contraseña incorrectos";
                }
    
    
            }catch(Exception $e){
                die("Error: " . $e->getMessage());
            }
        }
        
    ?>
    <?php
        if(!isset($_SESSION['login'])){
            include_once('formulario.html');
        }else{
            echo "Usuario: " . $_SESSION['login'];
        }
            
    ?>

    <h2>Contenido de la Web</h2>
    <table class="imagenes">
        <tr>
            <td><img src="images/1.jpg" alt="" width="300" height="166"></td>
            <td><img src="images/2.jpg" alt="" width="300" height="166"></td>
        </tr>
        <tr>
            <td><img src="images/3.jpg" alt="" width="300" height="166"></td>
            <td><img src="images/4.png" alt="" width="300" height="166"></td>
        </tr>
    </table>
</body>
</html>