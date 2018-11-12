@extends('layouts.app')

@section('content')
<h1>Tipos de Tickets</h1>
<table name = "TablaTickets" class ="table table-border table-striped">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th colspan="2">Acción</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <th>{{ $ticket->id }}</th>
            <th>{{ $ticket->nombre }}</th>
            <th>Q {{ $ticket->precio}}</th>
            <th><a href="{{ URL::to('tiposTicket/'. $ticket->id. '/edit') }}">Editar</a>
            <form method="get" action="{{route('tiposTicket.destroy', $ticket->id)}}">
            <input type="Hidden" name="_method" value = "delete">
            <button type="submit">Eliminar Ticket</button>
            </form></th>
        </tr>
    @endforeach
</table>
<div>
        {{ $tickets->links() }}  
</div>
<a href="{{ route('tiposTicket.create') }}">Crear Nuevo Ticket</a>
@endsection