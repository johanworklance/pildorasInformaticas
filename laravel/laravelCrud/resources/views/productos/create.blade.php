@extends("../layouts.plantilla")

@section("cabecera")
    <h1>Formulario Dr.Stone</h1>
@endsection

@section("contenido")
<form action="{{route('productos.index')}}" method="post">
    <table>
        <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombreArticulo">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Sección:</td>
            <td><input type="text" name="seccion">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td><input type="text" name="precio">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td><input type="text" name="fecha">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td>País de origen</td>
            <td><input type="text" name="paisOrigen">{{csrf_field()}}</td>
        </tr>
        <tr>
            <td><input type="submit" name="enviar" value="Enviar"></td>
            <td><input type="reset" name="borrar" value="Borrar"></td>
        </tr>
    </table>   
</form>
@endsection
@section("pie")
@endsection