@extends("../layouts.plantilla")

@section("cabecera")
    <h1>Dr.Stone Registro</h1>
@endsection

@section("contenido")
<table border="1">
<tr>    
    <th>Nombre de Artículo</th>
    <th>Sección</th>
    <th>Precio</th>
    <th>Fecha</th>
    <th>País de origen</th>
</tr>

    @foreach($productos as $producto)
        <tr>
            <td><a href="{{route('productos.edit',$producto->id)}}">{{$producto->nombreArticulo}}</a></td>
            <td>{{$producto->seccion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->fecha}}</td>
            <td>{{$producto->paisOrigen}}</td>
        </tr>
    @endforeach
</table>
<a href="{{route('productos.create')}}">Insertar Registros</a>
@endsection
@section("pie")
@endsection