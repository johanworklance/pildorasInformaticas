<?php

class Coche{
    protected $ruedas;
    public $color;
    protected $motor;

    public function __construct(){
        $this->ruedas=4;
        $this->color="";
        $this->motor=1600;
    }
    public function getRuedas(){
        return $this->ruedas;
    }
    public function getMotor(){
        return $this->motor;
    }

    public function arrancar(){
        echo "Estoy arrancando<br>";
    }
    public function girar(){
        echo "Estoy girando<br>";
    }
    public function establecerColor($colorCoche,$nombreCoche){
        $this->color=$colorCoche;
        echo "El color de este coche $nombreCoche es: $this->color<br>";
    }
}



class Camion extends Coche{
    
    public function __construct(){
        $this->ruedas=8;
        $this->color="gris";
        $this->motor=2600;
    }

    public function establecerColor($colorCamion,$nombreCamion){
        //reescritura del metodo de la super clase
        $this->color=$colorCamion;
        echo "El color de este camión $nombreCamion es: $this->color<br>";
    }

    public function arrancar(){
        parent::arrancar();//ejecuta el metodo de la super clase o padre
        echo "Camión arrancado<br>";
    }

    

}
