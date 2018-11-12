@extends('layouts.app')

@section('content')
<form method="Post" action="/MiCuenta/Abono">
{{csrf_field()}}
<div>
<label>Cantidad</label>
<input type="number"  step=".01" min="0" max="10000" value="0" name="abono">
</div>
<input type="submit" value="Abonar">
</form>
@endsection