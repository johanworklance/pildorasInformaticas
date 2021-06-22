<?php


    $textoMail= $_POST['comentarios'];
    $destinatario= $_POST['email'];
    $asunto= $_POST['asunto'];

    $headers= "MIME-Version: 1.0\r\n";
    $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers.= "From: Prueba Johan <pruebajohan1234@gmail.com>\r\n";

    //$exito= mail($destinatario,$asunto,$textoMail,$headers);//nota revisar archivo mercury, comente el $exito para no activarlo por error, si quieres probarlo descomentalo

    if($exito){
        echo "Mensaje enviado";
    }else{
        echo "Hubo un error";
    }