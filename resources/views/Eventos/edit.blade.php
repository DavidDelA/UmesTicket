@extends('layouts.app')

@section('content')
<form method= "post" action="{{action('EventosController@update',$id)}}">
{{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH"/>
	<label><DIV ALIGN="center"><P><h1> EVENTO</h1></DIV> </label><br>
    <table>
    <tr>
	 <td><label>Nombre de el Evento:</label></td><td><input type="text" id="evento" name="evento" value ="{{$eventos->evento}}" ><br></td>
	 </tr>
    
    
     <tr>
     <td><label>Fecha:</label></td><td><input type="date" id="fecha" name="fecha" value="{{$eventos->fecha}}"><br></td>
     </tr>
     <tr>
     <td><label>Horario Inicio:</label></td><td><input type="time" id="horarioinicio" name="horarioinicio"  value ="{{$eventos->horarioinicio}}"><br></td>
	 </tr>
     <tr>
     <td><label>Horario Final:</label></td><td><input type="time" id="horariofinal" name="horariofinal" value ="{{$eventos->horariofinal}}" ><br></td>
	 </tr>
     <tr>
     <td><label>Lugar:</label></td><td><input type="text" id="lugar" name="lugar" value ="{{$eventos->lugar}}" ><br></td>
     </tr>
    </table>

    
	 <input type ="submit" value="Actualizar">

     <div>
    <table>
     <tr><h1>Tickets Disponibles</h1>
         @for($i =0; $i< count($ticketsEvento); $i= $i+2)
         <th> {{$ticketsEvento[$i]->nombre}}</th>
        <th> <input type="number" name = "{{$ticketsEvento[$i]->id}}" min="0"  value ="{{ $ticketsEvento[$i+1] }}" ></th>
        </tr>
        @endfor   
    </table>
    </div>
</form> 
@endsection