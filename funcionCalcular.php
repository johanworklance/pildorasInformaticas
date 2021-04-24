<?php
    function calcular($num1,$operacion,$num2=NULL){
        
            if($operacion=='Incremento'){
                echo "El incremento de  $num1 es ".(++$num1);
            }elseif($operacion=='Decremento'){
                echo "El decremento de  $num1 es ".(--$num1);
            }else{
                switch ($operacion){
                    case 'Suma':
                      echo "El resultado de sumar $num1 + $num2 es ".($num1+$num2);
                      break;
                    case 'Resta':
                      echo "El resultado de restar $num1 - $num2 es ".($num1-$num2);
                      break;
                    case 'Multiplicación':
                      echo "El resultado de multiplicar $num1 * $num2 es ".($num1*$num2);
                      break;
                    case 'División':
                      echo "El resultado de dividir $num1 / $num2 es ".($num1/$num2);
                      break;
                    case 'Módulo':
                      echo "El módulo de  $num1 respecto a $num2 es ".($num1%$num2);
                    break;
                    
                  }
            }
        
        
    }