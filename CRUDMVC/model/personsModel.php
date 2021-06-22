<?php

    class Persons_model{
        
        private $db;
        private $persons;

        public function __construct(){

            require_once("connection.php");

            $this->db= Conectar::conexion();

            $this->persons= [];
        }

        public function getpersons(){

            require_once("paginacion.php");
            
            $consulta=$this->db->query("SELECT * FROM datos_usuarios LIMIT $empezarDesde,$tamañoPaginas");

            while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                
                //array_push($this->persons,$fila);esta y la linea de abajo funcionan igual
                $this->persons[]=$fila;
            }

            return $this->persons;
        }
    }

    ?>