@extends("layout.plantilla")<!--heredamos de la plantilla, nombrecarpeta.archivo-->

@section("cabecera")<!--el div que queremos copiar o seccion de la plantilla-->
@endsection<!--se cierra el section-->

@section("infoGeneral")
    @if(count($alumnos))<!--si hay algo en el array alumnos-->
        <table>
            @foreach($alumnos as $persona)<!--los comandos php se usan con el @-->
                <tr>
                    <td>
                        {{$persona}}
                    </td>
                </tr>
            @endforeach
        </table>
        @else<!--el else no se cierra y va dentro del endif-->
            {{"Sin alumnos"}}
    @endif
@endsection

@section("pie")<!--en la plantilla el footer ya tiene un contenido prefijado-->
@endsection