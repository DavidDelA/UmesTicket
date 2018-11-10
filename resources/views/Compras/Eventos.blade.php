@extends('layouts.app')

@section('content')
<h1>Eventos Próximos</h1>
<table>
    <tr>
    <th>Nombre</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Tickets Disponibles</th>
    <th></th>
    </tr>
    @foreach()
    <tr>
    <th>{{ $evento->evento }}</th>
    <th>{{ $evento-> fecha }} </th>
    <th><a href="{{ URL::to('CompraTicketsController/'. $evento->id. '/detalle') }}">Comprar Tickets</a></th>
    </tr>
    @endforeach

</table>
@endsection