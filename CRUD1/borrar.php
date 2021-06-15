<?php

    include_once('conexion.php');

    $id=$_GET['id'];

    $base->query("DELETE FROM datos_usuarios WHERE id= '$id'");

    header("Location:index.php");