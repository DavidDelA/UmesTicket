@extends('layouts.app')

@section('content')
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
<h1>Mi Saldo</h1>
<h3>Saldo de la cuenta: {{$saldo}}</h3>
<a href="{{ URL::to('/MiCuenta/Abonar') }}">Abonar Saldo</a>
@endsection