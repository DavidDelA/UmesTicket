@extends('layouts.app')

@section('content')
<h1>Tipos de Tickets</h1>
<table name = "TablaTickets">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th colspan="2">Acción</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <th>{{ $ticket->id }}</th>
            <th>{{ $ticket->nombre }}</th>
            <th><a href="{{ URL::to('tiposTicket/'. $ticket->id. '/edit') }}">Editar</a></th>
            <th>Eliminar</th>
        </tr>
    @endforeach
</table>
<div>
        {{ $tickets->links() }}  
</div>
<a href="{{ route('tiposTicket.create') }}">Crear Nuevo Ticket</a>
@endsection