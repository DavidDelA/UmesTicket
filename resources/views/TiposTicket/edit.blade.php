@extends('layouts.app')

@section('content')
<h1>Editar Ticket</h1>
<form method="post" action="{{action('TiposTicketController@update',$id)}}">
{{csrf_field()}}
    <input type="Hidden" name="_method" value = "PATCH">
    <div>
    <label>Nombre</label>
    <input type="text" name="nombre" value ={{$ticket->nombre}}>
    </div>
    <div>
    <label>Precio</label>
    <input type="number" step=".01" name="precio" min="0.00" value="{{$ticket->precio}}">
    </div>
    <input type="submit" value="Guardar">
</form>
@endsection