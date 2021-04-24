<style>
    .no_validado {
      font-size: 18px;
      color: #F00;
      font-weight: bold;
    }

    .validado {
      font-size: 18px;
      color: #0C3;
      font-weight: bold;
    }
</style>
<?php
    if(isset($_POST['enviando'])){
        $usuario= $_POST['nombre_usuario'];
        $edad= $_POST['edad_usuario'];

        if($usuario=='juan'){
            echo "<p class='validado'>Puedes entrar usuario $usuario de edad $edad y ". $_POST['enviando']."</p>";
        }else{
            echo "<p class='no_validado'>No puedes pasar!!!!!</p>";
        }

        if($edad<=18){
            echo "<br>Eres menor de edad";
        }elseif($edad<=40){
            echo "<br>Eres joven";
        }elseif($edad<=65){
            echo "<br>Eres mayor";
        }else{
            echo "<br>Cuídate";
        }

        echo $edad<18?"<br>No puedes acceder.":"<br>Puedes acceder";
        echo "<br>";
        $holaJuan= $usuario=='juan' && $edad=='19'? "Hola juan!!":"No eres juan";

        echo $holaJuan;
        echo "<br>";
        $contra= $_POST['contra'];

        switch(true){//forma de usar switch con varios parametros en PHP
            case $usuario=='Juan' && $contra==123:
                echo "Usuario autorizado, hola $usuario Valdez";
                break;
            case $usuario=='María' && $contra==321:
                echo "Usuario autorizado, hola $usuario Bolivar";
                break;
            case $usuario=='Pedro' && $contra==987:
                echo "Usuario autorizado, hola $usuario Marmol";
                break;
            default:
                echo "Usuario no autorizado";
        }


    }
  