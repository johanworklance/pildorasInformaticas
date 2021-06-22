<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


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
    include_once('conexion.php');

    /* $conexion= $base->query("SELECT * FROM datos_usuarios");
    $registros= $conexion->fetchAll(PDO::FETCH_OBJ); */

    //-------------------------paginacion---------------------------------------
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

    //--------------------------------------------------------------------------



    $registros= $base->query("SELECT * FROM datos_usuarios LIMIT $empezarDesde,$tamañoPaginas")->fetchAll(PDO::FETCH_OBJ);//es un objeto no un array, a sus propiedades se accede con el comando ->
    if(isset($_POST['cr'])){

      $nombre= $_POST['Nom'];
      $apellido= $_POST['Ape'];
      $direccion= $_POST['Dir'];

      $sql="INSERT INTO datos_usuarios(nombre,apellido,direccion) VALUES(:nom,:ape,:dir)";

      $resultado= $base->prepare($sql);

      $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dir"=>$direccion));

      header("Location:index.php");
    }


?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?= $_SERVER['PHP_SELF']?>" method="post" >

    <table width="50%" border="0" align="center">
      <tr >
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr> 
    
      <?php
          foreach($registros as $persona):?>
      <tr>
          <td><?= $persona->id?></td>
          <td><?= $persona->nombre?></td>
          <td><?= $persona->apellido?></td>
          <td><?= $persona->direccion?></td>
    
          <td class='bot'><a href="borrar.php?id=<?= $persona->id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>

          <td class='bot'><a href="editar.php?id=<?= $persona->id?>&nombre=<?= $persona->nombre?>&apellido=<?= $persona->apellido?>&direccion=<?= $persona->direccion?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
      </tr>   
      <?php endforeach?>

    <tr>
    
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr> 
        <tr>
        <td colspan="4">
            <?php
            for($i=1;$i<=$totalPaginas;$i++){

              echo "<a href='?pagina=$i'> $i </a>";//se pueden enviar numeros a la propia pagina con esa 'direccion'
            }

            ?>
        </td>
        </tr>   
    </table>
</form>
    
<p>&nbsp;</p>
</body>
</html>