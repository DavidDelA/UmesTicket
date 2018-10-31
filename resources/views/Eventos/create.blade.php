@extends('layouts.app')

@section('content')
<form method= "post" action="{{route('Eventos.store')}}">
{{ csrf_field() }}
	 <h1>Evento</h1>
    <table>
     <tr>
	 <td><label>Nombre de el Evento:</label></td><td><input type="text" id="evento" name="evento" ><br></td>
	 </tr>
     
     
     <tr>
     <td><label>Fecha:</label></td><td><input type="date" id="fecha" name="fecha"><br></td>
     </tr>
     <tr>
     <td><label>Horario Inicio:</label></td><td><input type="time" id="horarioinicio" name="horarioinicio" ><br></td>
	 </tr>
     <tr>
     <td><label>Horario Final:</label></td><td><input type="time" id="horariofinal" name="horariofinal" ><br></td>
	 </tr>
     <tr>
     <td><label>Lugar:</label></td><td><input type="text" id="lugar" name="lugar" ><br></td>
     </tr>
    </table>

     <table >
     <tr><h1>Tickets para el Evento</h1>
         @foreach ($tiposTicket as $tipo)
         <td> {{$tipo->nombre}}</td>
        <td> <input type="number" name = "{{$tipo->nombre}}" value ="0" ></td>
        </tr>
        @endforeach    
    </table>
	 <input type ="submit" value="Guardar">
</form> 
@endsection