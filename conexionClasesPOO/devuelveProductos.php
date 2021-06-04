<?php

    require_once("conexion.php");

    class DevuelveProductos extends Conexion{
        
        public function __construct(){
            parent::__construct();
        }

        public function getProductos(){
            $resultado= $this->conexion->query('SELECT * FROM `artículos`');

            $productos=$resultado->fetch_all(MYSQLI_ASSOC);

            return $productos;
        }
    }