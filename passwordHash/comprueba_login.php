<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

try{
	
	$login=htmlentities(addslashes($_POST["login"]));
	
	$password=htmlentities(addslashes($_POST["password"]));
	
	$contador=0;

	$base=new PDO("mysql:host=localhost; dbname=prueba" , "root", "");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql="SELECT * FROM userspass WHERE user= :login";
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":login"=>$login));
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			//echo "Usuario: " . $registro['user'] . " Contraseña: " . $registro['password'] . "<br>";	
			
			if(password_verify($password,$registro['password'])){
				$contador++;
			}
					
			
		}

		if($contador){
			echo "Usuario registrado";
		}else{
			echo "Usuario no registrado";
		}
		
							
		
		
		$resultado->closeCursor();

	
	
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}




?>
</body>
</html>