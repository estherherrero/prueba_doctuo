@extends('layouts.doctuoPrueba')

@section('content')

<div class = "DatosPer">
    <table>
            <tr>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Edad</th>
                <th>Género</th>
            </tr>
            @foreach($personas as $persona)
                <tr>
                    <td>{{$persona['name']}}</td>
                    <td>{{$persona['firstSurname']}}</td>
                    <td>{{$persona['secondSurname']}}</td>
                    <td>{{$persona['age']}}</td>
                    <td>@if (( $persona['gender'])=== "female")
                        Mujer
                        @endif 
                        @if (( $persona['gender'])=== "male")
                        Hombre
                        @endif
                        
                    </td>
                </tr>
            @endforeach
    </table>
       
 </div>    
    
    
@endsection