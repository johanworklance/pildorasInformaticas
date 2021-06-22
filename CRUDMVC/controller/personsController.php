<?php
   

    require_once("model/personsModel.php");

    $persons=new Persons_model();

    $matrizPersons=$persons->getpersons();//matrizPersons debe quedar sin los corchetes de lo contrario, el array que envia el metodo se guardara en la posicion 0 de matrizPersons

  
    
    require_once("view/personsView.php");

?>
    