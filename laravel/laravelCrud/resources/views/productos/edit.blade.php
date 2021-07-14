@extends("../layouts.plantilla")

@section("cabecera")
    <h1>Editar Registro Dr.Stone</h1>
@endsection

@section("contenido")
<!-- <form action="{{route('productos.update', $producto->id)}}" method="post"> -->
{!!Form::model($producto,['route' => ['productos.update', $producto->id]])!!}
    @method('PUT')
    <table>
        <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombreArticulo" value="{{$producto->nombreArticulo}}">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Sección:</td>
            <td><input type="text" name="seccion" value="{{$producto->seccion}}">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td><input type="text" name="precio" value="{{$producto->precio}}">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td><input type="text" name="fecha" value="{{$producto->fecha}}">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>País de origen</td>
            <td><input type="text" name="paisOrigen" value="{{$producto->paisOrigen}}">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td><input type="submit" name="enviar" value="Actualizar"></td>
            <td><input type="reset" name="borrar" value="Borrar campos"></td>
        </tr>
    </table>   
<!-- </form> -->
{!! Form::close() !!}
<!-- <form action="{{route('productos.destroy', $producto->id)}}" method="post"> -->
{!!Form::open(['action' => ['App\Http\Controllers\productosController@destroy', $producto->id]])!!}
    @method('DELETE')
    @csrf
    <input type="submit" value="Eliminar Registro">
{!! Form::close() !!}
<!-- </form> -->
@endsection
@section("pie")
@endsection