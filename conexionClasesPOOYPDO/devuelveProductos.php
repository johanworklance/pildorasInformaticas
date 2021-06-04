<?php

    require_once("conexion.php");

    class DevuelveProductos extends Conexion{
        
        public function __construct(){
            parent::__construct();
        }

        public function getProductos($pais){

            $sql='SELECT * FROM `artículos` WHERE`país de origen`=' . "'$pais'";

            $sentencia=$this->conexion->prepare($sql);

            $sentencia->execute(array());

            $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion= null;

            /* $resultado= $this->conexion->query('SELECT * FROM `artículos` WHERE`país de origen`=' . "'$pais'");

            $productos=$resultado->fetch_all(MYSQLI_ASSOC);

            return $productos; */
        }
    }