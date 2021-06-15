<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

    include_once('conexion.php');

    if(!isset($_POST['bot_actualizar'])){
        $id= $_GET['id'];
        $nombre= $_GET['nombre'];
        $apellido= $_GET['apellido'];
        $direccion= $_GET['direccion'];
    }else{
        $id= $_POST['id'];
        $nom= $_POST['nom'];
        $ape= $_POST['ape'];
        $dir= $_POST['dir'];

        $sql="UPDATE datos_usuarios SET nombre= :nom, apellido= :ape, direccion= :dir WHERE id= :id";

        $resultado= $base->prepare($sql);

        $resultado->execute(array(":id"=>$id,":nom"=>$nom,":ape"=>$ape,":dir"=>$dir));

        header("Location:index.php");
    }

        
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?= $_SERVER['PHP_SELF']?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?= $id?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?= $nombre?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?= $apellido?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?= $direccion?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>