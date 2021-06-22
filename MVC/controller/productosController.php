<?php

    require_once("model/productosModel.php");

    $productos=new Productos_model();

    $matrizProductos=$productos->getProductos();

    require_once("view/productosView.php");



