<?php

    setcookie("idiomaSeleccionado",$_GET['idioma'],time()+86400);

    header("Location:verCookie.php");

    