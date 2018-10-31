@extends('layouts.app')

@section('content')
<h1>Editar Ticket</h1>
<form method="post" action="{{action('TiposTicketController@update',$id)}}">
{{csrf_field()}}
    <input type="Hidden" name="_method" value = "PATCH">
    <label>Nombre</label>
    <input type="text" name="nombre" value ={{$ticket->nombre}}>
    <input type="submit" value="Guardar">
</form>
@endsection