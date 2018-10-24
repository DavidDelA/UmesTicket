@extends('layouts.app')

@section('content')

 
<form method= "post" action="{{route('Eventos.store')}}">
{{ csrf_field() }}
    <DIV syle="float:left">
	<label><P><h1> EVENTO</h1></label>
    <table>
    <tr>
	 <td><label>Nombre de el Evento:</label></td><td><input type="text" id="evento" name="evento" ></td>
	 </tr>
     <tr>
     <td><label>Fecha:</label></td><td><input type="text" id="fecha" name="fecha" ></td>
	 </tr>
     <tr>
     <td><label>Total de Publico(personas):</label></td><td><input type="int" id="publico" name="publico" ></td>
     </tr>
     <tr>
     <td> <label>Tickets totales:</label></td><td><input type="text" id="tickets" name="tickets" ></td>
	 </tr>
     <tr>
     <td><label>Horario Inicio:</label></td><td><input type="text" id="horarioinicio" name="horarioinicio" ></td>
	 </tr>
     <tr>
     <td><label>Horario Final:</label></td><td><input type="text" id="horariofinal" name="horariofinal" ></td>
	 </tr>
     <tr>
     <td><label>Lugar:</label></td><td><input type="text" id="lugar" name="lugar" ></td>
     </tr>
    </table>
    </DIV>

    <DIV style="float:right">
     <table >
     <tr><h1>Tipos de Ticket</h1>
         @foreach ($tiposTicket as $tipo)
         <td> {{$tipo->nombre}}</td>
        <td> <input name = "{{$tipo->nombre}}"  ></td>
        </tr>
        @endforeach
        
    </table>
    </DIV>

    <input type ="submit" value="Guardar">

</form> 


@endsection

	 

