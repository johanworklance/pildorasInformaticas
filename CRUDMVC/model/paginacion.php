<?php

require_once("model/connection.php");

$base= Conectar::conexion();

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

    $sql="SELECT * FROM datos_usuarios";

    $resultado=$base->prepare($sql);

    $resultado->execute(array());

    $numFilas=$resultado->rowCount();

    $totalPaginas= ceil($numFilas/$tamañoPaginas);

    $resultado->closeCursor();

    ?>