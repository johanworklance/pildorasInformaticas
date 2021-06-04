<?php

    require_once('datosConexion.php');

    
    class Conexion{

        protected $conexion;

        public function __construct(){

            try{
                $this->conexion= new PDO('mysql:host=localhost; dbname=prueba',"root","");

                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->conexion->exec("SET CHARACTER SET utf8");


            }catch(Exception $e){
                echo "La línea del error es: " . $e->getLine();
            }






            //------------------------------------------------------------------
            /* $this->conexion= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->conexion->connect_errno){
                echo "Fallo al conectar con la base de datos: " . $this->conexion->connect_error;

                return;//pa que se salga, no tiene sentido seguir el constructor si hubo un fallo
            }

            $this->conexion->set_charset(DB_CHARSET); */
        }
    }