@extends('layouts.app')

@section('content')
<h1>Creación de Tickets</h1>
<form method="Post" action="/tiposTicket">
{{csrf_field()}}
<label>Nombre</label>
<input type="text" name="nombre">
<input type="submit" value="Guardar">
</form>
@endsection