<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    body{
        padding:0;
        margin:0;
    }
        .imagenCabecera{
            float:right;
            margin-right:150px;
            display:inline-block;
            width:100px;
            height:100%;
            border-radius:5px;
            padding:0 2px; 
        }
        .cabecera{
            text-align:center;
            font-size:larger;
            font-family:Tahoma,Geneva,sans-serif;
            margin-bottom:50px;
            color:#ff8000;
            height:100px;
            background:#000;
           
        }
        h1{
            display:inline-block;
        }
        .contenido form{
            width:300px;
            margin:0 auto;
        }
        .pie{
            position:fixed;
            bottom:0px;
            width:100%;
            font-size:0.7em;
            padding:20px;
            background:#000;
            color:#ff8000;
        }
        .contenido table{
            margin:0 auto;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        @yield("cabecera")  
        <img src="{{asset('images/logo.jpg') }}" alt="" class="imagenCabecera">
    </div>
    <div class="contenido">
        @yield("contenido")
    </div>
    <div class="pie">
        @yield("pie")
        Curso de Laravel Johan Nieto
    </div>
</body>
</html>