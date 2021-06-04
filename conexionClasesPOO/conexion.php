<?php

    require_once('datosConexion.php');

    
    class Conexion{

        protected $conexion;

        public function __construct(){

            
            $this->conexion= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->conexion->connect_errno){
                echo "Fallo al conectar con la base de datos: " . $this->conexion->connect_error;

                return;//pa que se salga, no tiene sentido seguir el constructor si hubo un fallo
            }

            $this->conexion->set_charset(DB_CHARSET);
        }
    }