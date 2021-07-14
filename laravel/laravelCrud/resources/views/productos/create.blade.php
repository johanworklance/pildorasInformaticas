@extends("../layouts.plantilla")

@section("cabecera")
    <h1>Formulario Dr.Stone</h1>
@endsection

@section("contenido")
<!-- <form action="{{route('productos.index')}}" method="post"> -->

<!-- <form method="POST" action="/productos" enctype="multipart/form-data"> --><!--esto seria para un formulario que envia archivos sin laravel collective-->


{!! Form::open(['url' => "/productos",'method' => 'post','files'=>true]) !!}
@csrf

    <table>
        <tr>
            <td>
            <!-- <input accept="image/*" type="file" name="file" > -->
                {!!Form::file('file')!!}
            </td>
        </tr>

    </table>
    <table>
        <tr>
            <td>{!!Form::label('lblNombre', 'Nombre:')!!}</td>
            <!-- <td><input type="text" name="nombreArticulo">{{csrf_field()}}</td> -->
            <td>{!!Form::text('nombreArticulo')!!}</td>
        </tr>
        <tr>
            <!-- <td>Sección:</td>
            <td><input type="text" name="seccion"></td> -->
            <td>{!!Form::label('lblSeccion', 'Sección:')!!}</td>
            
            <td>{!!Form::text('seccion')!!}</td>
        </tr>
        <tr>
            <!-- <td>Precio:</td>
            <td><input type="text" name="precio"></td> -->
            <td>{!!Form::label('lblPrecio', 'Precio:')!!}</td>
            
            <td>{!!Form::text('precio')!!}</td>
        </tr>
        <tr>
            <!-- <td>Fecha:</td>
            <td><input type="text" name="fecha"></td> -->
            <td>{!!Form::label('lblFecha', 'Fecha:')!!}</td>
            
            <td>{!!Form::text('fecha')!!}</td>
        </tr>
        <tr>
            <!-- <td>País de origen</td>
            <td><input type="text" name="paisOrigen"></td> -->
            <td>{!!Form::label('lblPaisOrigen', 'País de origen:')!!}</td>
            
            <td>{!!Form::text('paisOrigen')!!}</td>
        </tr>
        <tr>
            <td><!-- <input type="submit" name="enviar" value="Enviar"> -->
            {!!Form::submit('Enviar')!!}
            </td>
            <td><!-- <input type="reset" name="borrar" value="Borrar"> -->
            {!!Form::reset('Borrar')!!}</td>
        </tr>
    </table>   
{!! Form::close() !!}
<!-- </form> -->

@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif
@endsection
@section("pie")
@endsection