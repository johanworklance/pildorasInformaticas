<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
<?php
    include_once('conexion.php');

    /* $conexion= $base->query("SELECT * FROM datos_usuarios");
    $registros= $conexion->fetchAll(PDO::FETCH_OBJ); */

    $registros= $base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);//es un objeto no un array, a sus propiedades se accede con el comando ->
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
    <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
    </table>
</form>
<p>&nbsp;</p>
</body>
</html>