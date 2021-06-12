<?php

    if(!isset($_COOKIE['idiomaSeleccionado'])){
        header("Location:pag1.php");
    }elseif($_COOKIE['idiomaSeleccionado']=='es'){
        header("Location:spanish.php");
    }elseif($_COOKIE['idiomaSeleccionado']=='en'){
        header("Location:english.php");
    }