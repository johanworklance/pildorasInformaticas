<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- <style>
        .contenedor{
            background-color:red;
            text-align:center;
        }
        .infoGeneral{
            background-color:blue;
            margin:200px 0;
            color:white;
        }
        .pie{
            background-color:yellow;
        }
        table{
            width:50%;margin:auto;
        }
        td{
            border:2px solid black;
        }
    </style> -->
</head>
<body>
    <!-- <div class="contenedor">
        arobayield("cabecera")
    </div>
    <div class="infoGeneral">
        arobayield("infoGeneral")
    </div>
    <div class="pie">
        arobayield("pie")
        <h2>Finalización, pie de página</h2>
    </div> --><!-- yield comando que crea una copia de este div para usar en los otros archivos, por cierto no comentar usando el aroba que se bugea el laravel, es decir se quedan comando laravel con un aroba en los comentarios, laravel los interpreta asi esten comentados, es muy loco, por eso puse 'arobayield'-->


        @include("layout.navbar")
        @yield("cabecera")
        @include("layout.card")
        @yield("infoGeneral")

        @yield("pie")
        <h2>Finalización, pie de página</h2>

<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>