<?php

include_once('objBlog.php');

class ManejoObjetos{

    private $conexion;

    public function __construct($conexion){

        $this->setConexion($conexion);
    }

    public function setConexion(PDO $conexion){
        $this->conexion= $conexion;
    }

    public function getContenidoPorFecha(){
        $matriz= [];
        $contador=0;

        $resultado=$this->conexion->query("SELECT * FROM contenido ORDER BY fecha DESC");

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

            $blog= new ObjetoBlog();

            $blog->setId($registro['id']);
            $blog->setTitulo($registro['titulo']);
            $blog->setFecha($registro['fecha']);
            $blog->setComentarios($registro['comentarios']);
            $blog->setImagen($registro['imagen']);

            $matriz[$contador]=$blog;
            $contador++;
        }

        return $matriz;

    }

    public function insertaContenido(ObjetoBlog $blog){

        
        $titulo= $blog->getTitulo();
        $fecha= $blog->getFecha();
        $comentarios= $blog->getComentarios();
        $imagen= $blog->getImagen();
    

        $sql= "INSERT INTO contenido (titulo,fecha,comentarios,imagen) VALUES('$titulo','$fecha','$comentarios','$imagen')";

        $this->conexion->exec($sql);
    }
}