@extends('layouts.app')

@section('content')
<h1>Eventos Próximos</h1>
<table class ="table table-border table-striped" >
    <tr>
    <th>Nombre</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Tickets Disponibles</th>
    <th></th>
    </tr>
    @foreach($eventos as $evento)
    <tr>
    <td>{{ $evento->evento }}</td>
    <td>{{ $evento->fecha }}</td>
    <td>{{ $evento->horarioinicio}}-{{ $evento->horariofinal }} </td>
    @if($evento->tickets > 0)
    <td><label>{{ $evento->tickets }}</label></td>
    @else
    <td><label color:red>Agotados</label></td>
    @endif
    <td><a href="{{ URL::to('Eventos/'. $evento->id. '/Detalle') }}">Comprar Tickets</a></td>
    </tr>
    @endforeach

</table>
@endsection