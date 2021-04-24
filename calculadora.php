<?php
include_once('funcionCalcular.php');
    if(isset($_POST['button'])){
        if(!isset($_POST['num2'])){
            $num1= $_POST['num1'];
            $operacion= $_POST['operacion'];
            calcular($num1,$operacion);
        }else{
            $num1= $_POST['num1'];
            $num2= $_POST['num2'];
            $operacion= $_POST['operacion'];

            /* if(!strcmp("Suma",$operacion)){//recordar que si son iguales strcmp da 0, lo negamos,    da 1
              echo "El resultado de sumar $num1 + $num2 es ".($num1+$num2);
            } */
            calcular($num1,$operacion,$num2);

        }
        
    }

    