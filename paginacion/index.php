<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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
    <?php
        try{
            
            $base= new PDO("mysql:host=localhost; dbname=prueba","root","");

            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $base->exec("SET CHARACTER SET utf8");

            $tamañoPaginas=3;//numero de items por pagina, y segundo parametro del LIMIT que indica hasta cuantos registros traer

            $pagina=1;//numero de la pagina actual

            if(isset($_GET['pagina'])){
                if($_GET['pagina']==1){

                    header("Location:index.php");
                }else{
                    $pagina=$_GET['pagina'];//numero de la pagina actual
                }
            }

            
            $empezarDesde=($pagina-1)*$tamañoPaginas;//indice para el LIMIT de la sentencia, desde donde hara la consulta, si la pagina es 1 entonces seria 1-0=0 0*3=0 entonces comienza desde el registro 0

            $sql="SELECT `nombre artículo`, sección, `país de origen`,precio FROM artículos WHERE sección= 'DEPORTE'";

            $resultado=$base->prepare($sql);

            $resultado->execute(array());

            $numFilas=$resultado->rowCount();

            $totalPaginas= ceil($numFilas/$tamañoPaginas);//redondeamos hacia arriba, aqui daban 11 registros divididos entre 3, y redondeando darian 4 paginas

            echo "Número de registros de la consulta: $numFilas <br>";
            echo "Mostramos $tamañoPaginas registros por página<br>";
            echo "Mostrando la página $pagina de $totalPaginas<br>";

            $resultado->closeCursor();//cerramos la anterior consulta con todos los registros para el calculo del total

            $sqlLimite="SELECT `nombre artículo`, sección, `país de origen`,precio FROM artículos WHERE sección= 'DEPORTE' LIMIT $empezarDesde,$tamañoPaginas";

            $resultado=$base->prepare($sqlLimite);

            $resultado->execute(array());

            while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){
                echo "Nombre artículo: " . $registro['nombre artículo'] . 
                     " Sección: " . $registro['sección'] . 
                     " País de origen: " . $registro['país de origen'] . 
                     " Precio: " . $registro['precio'] . "<br>";
            }    


        }catch(Exception $e){
            echo "Línea de Error: " . $e->getLine() . $e->getMessage();
        }


        //-----------------------Paginación-------------------------------------

        for($i=1;$i<=$totalPaginas;$i++){

            echo "<a href='?pagina=$i'> $i </a>";
        }


    ?>  

    
</body>
</html>