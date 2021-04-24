<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .resaltar{
        color: #f00;
        font-weight: bold;
        border: 2px solid black;
    }
</style>
<body>
    <?php
        require_once("dameDatos.php");
        require_once('vehiculo.php');
        $loco=1;
        $crazy="loco";
        echo "<h1>hola mundo $loco $crazy</h1><br>";
        print "print hola $crazy".(2+2);

        print '<br>print hola $crazy';//la comilla simple no reconoce variables

                        echo "<br>echo hola $crazy".(2+2);
                    echo '<br>echo hola $crazy<br>';
        echo $loco,$crazy;//solo echo puede imprimir variables directamente

        echo "<br>";
        dameDatos();

        $nombre= "maria";

        function dameNombre(){
            global $nombre;//para que use la del ambito fuera de la función
            $nombre= "juan";
            echo $nombre;
        }
        dameNombre();
        echo "<br>";
        echo $nombre;
        echo "<br>";

        function incrementaVariable(){
            static $contador=0;/*con static, está línea solo se ejecutara una vez
                                * y además el valor de está variable se conservara
                                * aunque ya se haya terminado la función
                                */
            $contador++;
            echo "$contador<br>";
        }//cuando la función termina aquí las variables dentro se destruyen
        incrementaVariable();
        incrementaVariable();
        incrementaVariable();//si la variables es static, aquí valdra 3

        echo "<p class='resaltar'>Esto es un ejemplo de frase</p>";
        echo "<p class=\"resaltar\">Esto es un ejemplo con caracter de escape</p>";

        if(!print "hola"){//print(función) devuelve 1, echo(expresión) no devuelve nada
            echo "es uno";
        }

        $variable1="Casa";
        $variable2="CASA";

        $resultado= strcmp($variable1,$variable2);//iguales igual a 0, diferentes igual a 1
        echo "<br>$resultado";//1

        $resultado1= strcasecmp($variable1,$variable2);//como el anterior, pero no importan las mayusculas
        echo "<br>$resultado1";//0
        echo "<br>";

        if($resultado){
            echo "No coinciden $variable1 $variable2, strcmp es casesensitive";
        }
        echo "<br>";
        if(!$resultado1){
            echo "Coinciden $variable1 $variable2, strcasecmp no es casesensitive";
        }
        echo "<br>";
        $variableNum=8;
        $variableStr="8";

        if($variableNum == $variableStr){
            echo "$variableNum y \"$variableStr\" con == son iguales";
        }
        echo "<br>";
        if(!($variableNum === $variableStr)){
            echo "$variableNum y \"$variableStr\" con === no son iguales";
        }
        echo "<br>";
        if(!($variableNum != $variableStr)){
            echo "$variableNum y \"$variableStr\" con !=  son iguales";
        }
        echo "<br>";
        if($variableNum !== $variableStr){
            echo "$variableNum y \"$variableStr\" con !== no son iguales";
        }
        echo "<br>";
        echo "<br>";
        define("AUTOR","Johan");//constante

        echo "El autor es ".AUTOR;
        echo "<br>";
        echo "Esta línea de código es la ".__LINE__;
        echo "<br>";
        echo "La ruta del archivo es ".__FILE__;

        echo "<br>Random entre 3 y 8: ";
        echo rand(3,8);//aleatorio entre 3 y 8
        echo "<br>Número random ";
        echo rand();
        echo "<br>5 a la 3: ";
        echo pow(5,3);//5 elevado a la 3
        echo "<br>1.725 redondeo ";
        echo round(1.725,2);//número, decimales(opcional)
        echo "<br>";

        $numero= "5";
        $numero+=2;//casting implicito, cambio el string 5 a un int 5 con está suma
        echo "el número es $numero";

        $numero4="4";
        $result=(int)$numero4;//ahora es un entero, casting explicito, igual que en JAVA
        
        echo "<br>";
        $var1=true;
        $var2=false;
        $res=$var1 && $var2;//false
        $res=$var1 and $var2;//true por precedencia, el igual que es asignación tiene más valor que el and por consecuente el && vale más que este último, es como si la línea fuera en realidad $res=$var1 y no estuviera el and $var2
        
        if($res){
            echo "correcto";
        }else{
            echo "incorrecto";
        }

        echo "<br>";

        $varNueva=1;
        while($varNueva<6){
            echo "<br>".$varNueva;
            $varNueva++;
            if($varNueva==6){
                echo "<br>".$varNueva;
            }
        }
        echo "<br>Salimos del while";
        $vez=0;
        do{
            $varNueva++;
            $vez++;
            echo "<br>Entre una $vez";
        }while($varNueva<9);
        echo "<br>Sali del do while";
        echo "<br>";

        for($i=0;$i<=10;$i+=2){
            if($i==2){
                continue;
            }
            echo "<p>Hemos entrado en el bucle $i</p>";
            
            if($i==6){
                echo "<h1>Saldremos aquí en el valor $i</h1>";
                break;
            }
            if($i==10){
                echo "El bucle itero 6 veces";
            }
        }

        for($i=10;$i>=-10;$i--){
            if($i==0){//No podemos dividir entre cero
                echo "División entre cero no es posible<br>";
                continue;
            }
            echo "9/$i= ". 9/$i . "<br>";
        }
        echo "<br>";
        $palabra="Johan nieto";

        echo strtolower($palabra);
        echo "<br>".strtoupper($palabra);
        echo "<br>".ucwords($palabra);//mayuscula la primera letra de cada palabra

        function suma($num1,$num2=10){
            $resultado=$num1+$num2;
            return $resultado;
        }

        echo "<br>" . suma(2,5);
        echo "<br>" . suma(5);

        function fraseMayus($frase,$conversion=true){
            $frase= strtolower($frase);
            if($conversion){
                $resultado= ucwords($frase);
            }else{
                $resultado= strtoupper($frase);
            }
            return $resultado;
        }

        echo "<br>" . fraseMayus("esto es una prueba");
        echo "<br>" . fraseMayus("esto es una prueba",false);

        echo "<br>";

        function incrementa(&$valor1){//valor por referencia, manteniendo "conexión" con el valor de $value1, sin el ampersan no habria dicho vinculo
            $valor1++;
            return $valor1;
        }
        $value1=5;
        echo incrementa($value1) . "<br>";
        echo $value1;

        echo "<br>";

        function cambiaMayus(&$param){//si no colocamos el &, entonces sería un parametro por valor y el siguiente echo $cadena mostraría la cadena original
            $param= ucwords(strtolower($param));
            return $param;
        }
        $cadena="HOlA mUNDO";

        echo cambiaMayus($cadena) . "<br>";
        echo $cadena;

        echo "<br>";
//-----------------------------------------------------------------------------

        $renault= new Coche();
        $mazda= new Coche();

        $mazda->girar();
        echo $mazda->getRuedas();
        echo "<br>";
        $renault->establecerColor("rojo","renault");
        echo "<br>";

        $pegazo= new Camion();
        echo "el coche mazda tiene ". $renault->getRuedas() ." ruedas";
        echo "<br>";
        echo "el camión pegazo tiene " . $pegazo->getRuedas() . " ruedas";
        echo "<br>";

        $pegazo->arrancar();
        $pegazo->establecerColor("verde","pegazo");
        echo "<br>";

        echo "el mazda tiene un motor: " . $mazda->getMotor() . " cc";

        /* $mazda->ruedas=7;//antes era una propiedad public y podia cambiar el valor
        echo $mazda->ruedas; */

//-----------------------------------------------------------------------------
        
        echo "<br>";
        /* $semana[]= 'lunes';
        $semana[]= 'martes';
        $semana[]= 'miércoles';
         */
        //$semana= array('lunes','martes','miércoles');
        $semana= ['lunes','martes','miércoles'];
        
        echo $semana[1];
        echo "<br>";

        $datos=["Nombre"=>"Johan","Apellido"=>"Nieto","Edad"=>29];

        echo $datos['Nombre'] . " " . $datos['Edad'] . "<br>";
        $datos1="hola!";

        if(is_array($datos)){
            echo "si es un arreglo<br>";
        }
        if(!is_array($datos1)){
            echo "datos1 no es un array<br>";
        }       

        $datos['País']="España";

        foreach($datos as $clave => $valor){
            echo "$clave: $valor <br>";
        }
        $datos['pais']="España";
        $semana[]="Viernes";//se puede agregar valores así

        //for($i=0; $i<3;$i++){
        for($i=0; $i<count($semana);$i++){   
            echo "indice $i del día " . $semana[$i] . "<br>";
        }

        $alimentos= array("frutas"=>["tropical"=>"kiwi",
                                     "citrico"=>"mandarina",
                                     "otros"=>"manzana"],

                          "bebidas"=>array("frias"=>"limonada",
                                           "calientes"=>"café"),

                          "legumbres"=>["frijoles"=>"guisados",
                                        "garbanzos"=>"relleno"]);
       
        echo "<br>" . $alimentos["frutas"]["citrico"] . "<br>";
        echo "<br>" . $alimentos["legumbres"]["frijoles"] . "<br><br>";

        foreach($alimentos as $claveAlim=> $alim){
            echo "$claveAlim: <br>";
            foreach($alim as $clave=>$valor){
                echo "$clave: $valor<br>";
            }
            echo "<br>";
        }

        var_dump($alimentos);
    ?>
</body>
</html>