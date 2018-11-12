@extends('layouts.app')

@section('content')
<h1>Creación de Tickets</h1>
<form method="Post" action="/tiposTicket">
{{csrf_field()}}
<div>
<label>Nombre</label>
<input type="text" name="nombre">
</div>
<div>
<label>Precio</label>
<input type="number" step=".01" name="precio"value="0.00">
</div>
<input type="submit" value="Guardar">
</form>
@endsection