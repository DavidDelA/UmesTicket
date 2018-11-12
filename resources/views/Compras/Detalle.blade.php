@extends('layouts.app')

@section('content')
    <h1>{{$evento->evento}}</h1>
	 <table class ="table table-border table-striped" >
     <tr>
     <td><label>Fecha: </label></td><td><label>{{$evento->fecha}}</label></td>
     </tr>
     <tr>
     <td><label>Hora Inicio: </label></td><td><label>{{$evento->horarioinicio}}</label></td>
     </tr>
     <tr>
     <td><label>Hora Final: </label></td><td><label>{{$evento->horariofinal}}</label></td>
     </tr>
     <tr>
     <td><label>Lugar: </label></td><td><label>{{$evento->lugar}}</label></td>
     </tr>
     </table>
<form method= "post" action="{{action('CompraTicketsController@Comprar')}}">
{{ csrf_field() }}
    <input type="hidden" name="idEvento" value="{{$evento->id}}"/>
     <table>
     <tr><h1>Tickets Disponibles</h1>
         @for($i =0; $i< count($ticketsEvento); $i= $i+2)
         <th> {{$ticketsEvento[$i]->nombre}}</th>
        <th> <input type="number" name = "{{$ticketsEvento[$i]->id}}" min="0" max="{{ $ticketsEvento[$i+1] }}" value ="0" ></th>
        </tr>
        @endfor   
    </table>
	 <input type ="submit" value="Comprar">
</form> 
@endsection